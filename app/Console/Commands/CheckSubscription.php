<?php

namespace App\Console\Commands;

use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The expiry date of the devices are check';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param Request $request
     * @return int
     */
    public function handle()
    {
        // get status 1 and expire_date not null
        Purchase::where('status',1)
            ->where('expire_date' ,'<', Carbon::now())
            ->chunkById(100,function ($subs){
                foreach ($subs as $sub) {
                    $request = Request::create('/api/verification/'.$sub->receipt_token, 'GET');
                    $response = Route::dispatch($request);

                    $sub->update([
                        'status' => $response->original['status'],
                        'expire_date' => $response->original['expire_date'],
                    ]);
            }
        });
        $this->info('Subscription status has been updated.');
    }
}
