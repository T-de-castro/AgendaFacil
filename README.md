Esse é o modelo básico de um sistema, usando o AdminLTe, onde foi baixado o modelo, configurado para utilização do Vite, criados novos Models, Controllers e Views, com um sistema modelado, que traz o CRUD completo de Usuários, utilizando o Bootstrap para o estilo e o Laravel para Back-End e Front-End.
Para executar o programa, é necessário baixar o código via git clone, e executar os seguintes passos:

-> Abrir o cmd e rodas:
- composer install
- npm install (para rodar o npm run dev)
- copy .env.example .env

-> Ajustar o arquivo .env, alterando o banco para o desejado, neste caso foi utilizado o postgres (psql);
-> Caso alterar o banco de dados, deverá conferir o nome do SGBD no arquivo config/database;

-> Nomamente no cmd:
- php artisan key:generate
- php artisan migrate;
- php run serve

Assim o link já estará disponível, porém ainda é necessário cadastrar as roles (cargos), para que sejam listados no cadastro dos usuários.
