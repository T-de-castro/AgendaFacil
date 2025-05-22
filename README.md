Este é um sistema feito em Laravel, utilizando o front-end com Blade (Laravel) e consumindo uma API desenvolvida separadamente.
O sistema envia e recebe requisições da API, com o banco de dados em PostgreSQL.

Para rodar, deverá executar:

- Composer install;
- php artisan key:generate;
- php artisan migrate;
- php artisan serve