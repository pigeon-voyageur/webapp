cp .env.example .env
npm install
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
