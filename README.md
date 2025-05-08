# AgendaFacil
Sistema de Agendamento para postos de lavação de carros.


BOOTSTRAP
- Primeiro precisa instalar o Bootstrap:
https://getbootstrap.com/docs/5.3/getting-started/vite/

npm i --save-dev vite
npm i --save bootstrap @popperjs/core
npm i --save-dev sass

- Alterado o nome do arquivo e da pasta css para scss (Sass css)

- Importado o bootstrap no arquivo js e no scss;
@import 'admin-lte'; (scss)
import 'bootstrap'; (js)

- Apagado o arquivo bootstrap.js;

- No arquivo Vite.config.js, é preciso alterar os input do laravel para scss;

- Importar no Welcome.blade.php o scss e js:
@vite(['resources/scss/app.scss', 'resources/js/app.js'])


PARA RODAR O SISTEMA
- Rodar o servidor de desenvolvimento e o servidor:
php run dev
php artisan serve



ADMINLTE
- Instalar o AdminLTE:
https://adminlte.io/docs/3.2/

npm install admin-lte

- Importar o AdminLTE no arquivo js e no scss (Podendo remover o Bootstrap);



PÁGINAS:
- Para importar uma página do AdminLTe, é necessário acessar: nome_modules->admin-lte->dist->pages->Index.html
- Copiando o arquivo e colando no Welcome.blade.php;
- Comentar todos os link dentro do head e os scripts dentro do body;
- Importar o scss dentro do head e o js dentro do body;


SCROLLBAR:
- Instalar a depenência de OverlayScrollbar:
https://kingsora.github.io/OverlayScrollbars/

npm install overlayscrollbars

- Inserir o código abaixo no scss:
@import 'overlayscrollbars/styles/overlayscrollbars.css';

- Criar o arquivo overlayscrollbars.js e inserir o código abaixo:
import { 
  OverlayScrollbars
} from 'overlayscrollbars';

const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper) {
          OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });

- Importar o overlayscrollbars.js no app.js:
import './overlayscrollbars.js'


ÍCONES:
- Baixar os Bootstrap-Icons:
https://icons.getbootstrap.com

npm install bootstrap-icons

- Importar a biblioteca no scss;
- Criar a variável das fonts no scss (Podendo ser criado outro arquivo e importado no app):
$bootstrap-icons-font-dir: "bootstrap-icons/font/fonts" !default;

- Caso queira pode deixar as fontes no sistema local, copiando o font, colando em resources, e trocando a variável (Lembrando de importar no meta.glob as fonts tamém):
$bootstrap-icons-font-dir: "../fonts" !default;


IMAGENS:
https://laravel.com/docs/12.x/vite#blade-processing-static-assets

- Importar as imagens no app.js:
import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

- Localizar o nome da imagem e usar a sintaxe:
<img src="{{ Vite::asset('resources/images/logo.png') }}">

