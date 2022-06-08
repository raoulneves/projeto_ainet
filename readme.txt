instalar vendor:
composer install

reparar vendor:
composer update

instalar node_modules:
npm install

criar storage publico (se já existir e não for um atalho apagar):
php artisan storage:link

povuar dados e imagens:
php artisan migrate:fresh
composer dump-autoload
php artisan db:seed

