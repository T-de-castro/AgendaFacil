<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <!--hasSection valida se a seção existe, se existir, mostra o conteúdo-->
                @hasSection ('page-title')
                    <h3 class="mb-0">@yield('page-title')</h3>
                @endif

                <!--Criar uma Variável e usar ela no isset (if), se ela existir, mostra o conteúdo-->
                @isset($breadcrumbs)
                    <ol class="breadcrumb">
                        @forEach($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item">
                                <a href="#">{{$breadcrumb['label']}}</a>
                            </li>
                        @endforEach
                    </ol>
                @endisset

            </div>
            <div class="col-sm-6 text-end">
                @yield('page-actions')
            </div>
        </div>
    </div>
</div>
