Dentro da pasta \Projeto

copiar o ficheiro .envbackup e nomear a copia como o nome .env:
cp .envbackup .env

instalar vendor:
composer install

reparar e atualizar vendor:
composer update

instalar node_modules:
npm install

reparar e atualizar vendor:
npm update

criar storage publico (se já existir e não for um atalho apagar):
php artisan storage:link

povuar dados e imagens:
php artisan migrate:fresh
composer dump-autoload
php artisan db:seed

caso instalem algum package adicionem o commado aqui:

