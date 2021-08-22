
composer update
cp .env.example .env
php artisan key:generate
php artisan migrate

Postman collection
https://github.com/volkankocaali/mobile-api/blob/master/Teknasyon.postman_collection

**Api**

- 1- Register /api/register - POST
- 2- Purchase /api/purchase - POST
- 3- Check Subscription /api/check-subscription - POST

**Mock api - api/verification/{receipt} - GET**


