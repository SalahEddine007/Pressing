<!doctype html>
<!--[if lte IE 9]>     <html lang="{{ app()->getLocale() }}" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="{{ app()->getLocale() }}" class="no-focus"> <!--<![endif]-->
    <head>
        @include('Layouts.head')
        @yield('page_style')
        <style type="text/css">
            #page-container.page-header-modern #page-header > .content-header{
                padding-top: 0px;
                padding-bottom: 0px;
            }
            #page-container.page-header-modern #page-header {
                background-color: #fff;
                box-shadow: none !important;
            }
            header{
                background-color: white;
            }
            .ribbon-crystal{
                border-radius: 10px;
            }
            .block{
                border-radius: 8px;
            }
            a.block{
                background-color: transparent;
            }
            a.block i,a.block p {
                display: inline-block;
            }
            .photo-profile,.photo-user-profile{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 50px;
                border: 1px dashed #575757;
                color: #575757;
                cursor: pointer;
            }
            .photo-profile:hover,.photo-user-profile:hover{
                border: 1px dashed #42a5f5;
                color: #42a5f5;
            }
            .block-header,.block-header-default{
                background: linear-gradient(135deg,#2095f3 0,#26c6da 100%) !important;
                color: white !important;
            }
            .block-header h3,.block-header-default h3 {
                 color: white
             }


        </style>
        <link rel="stylesheet" href="{{asset('assets/js/plugins/dropzonejs/min/dropzone.min.css')}}">
    </head>
    <body>
    <!-- Page Container -->
    {{--<div id="page-container" class="side-scroll page-header-modern main-content-boxed">--}}
    <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed side-trans-enabled">

            @include('Layouts.profile')
            @include('Layouts.header')

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    {{--<div class="row gutters-tiny invisible" data-toggle="appear">--}}
                        <!-- Row #1 -->
                        <div class="row">
                            @can('create', 'App\Commande')
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-primary" href="/commandes">
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Nouveau</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="si si-plus fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endcan
                            @can('view', 'App\Commande')
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-success" href="/factures">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Commades</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="si si-layers fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endcan
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-gd-sun" href="/services">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Services</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="fa fa-flask fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-corporate" href="/categories">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Categorie</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="fa fa-tags fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @can('view', 'App\Client')
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-flat" href="/clients">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Clients</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="fa fa-users fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endcan
                            @can('view', 'App\User')
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-elegance" href="/users">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Utilisateurs</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="si si-users fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endcan
                            @can('view', 'App\User')
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-transparent ribbon ribbon-bookmark ribbon-crystal ribbon-left text-center bg-elegance" href="/Chiffre">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    <div class="block-content bg-black-op-5">
                                        <p class="font-w600 text-white">Chiffre d'affaire</p>
                                    </div>
                                    <div class="block-content">
                                        <p>
                                            <i class="si si-users fa-2x text-white-op"></i>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endcan
                        </div>
                    @yield('content')
                </div>
            </main>

            <!-- END Main Container -->
            @include('Layouts.footer')
        </div>

        <!-- Codebase Core JS -->
        <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.appear.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{asset('assets/js/core/js.cookie.min.js')}}"></script>
        <script src="{{asset('assets/js/codebase.js')}}"></script>
        <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/be_pages_dashboard.js')}}"></script>
        <script src="{{asset('assets/js/pages/profile_validation.js')}}"></script>
         <script type="text/javascript">
             //profile
            $('.photo-profile').click(function(){ $('#profile_picture').trigger('click'); });
            //
            $('#profile_picture').change(function () {
                var filename = $('#profile_picture').val().split('\\').pop();
                $("#photo-name").html(filename);
            });
            // new profile
            $('.photo-user-profile').click(function(){ $('#user_picture').trigger('click'); });
            //
            $('#user_picture').change(function () {
                var filename = $('#user_picture').val().split('\\').pop();
                $("#photo-name-user").html(filename);
            });
        </script>
        @yield('page_script')
    </body>
</html>