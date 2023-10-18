cp .env.example .env
npm install
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
