<!DOCTYPE html>
<html lang="es">

    <head>
        <title>@yield('page_title', 'Inicio')</title>
        <meta charset="UTF-8">
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/assets/icons/flyico.png">
        <link rel="stylesheet" href="/css/sweet-alert.css">
        <link rel="stylesheet" href="/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="/css/style.css">
        @yield('stylesheets')
    </head>

    <body>
      

        <div class="navbar-lateral full-reset">
            <div class="visible-xs font-movile-menu mobile-menu-button"></div>
            <div class="full-reset container-menu-movile custom-scroll-containers">
                <div class="logo full-reset all-tittles"><i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button"
                        style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i></div>
                <div class="full-reset" style="background-color:#fff; padding: 10px 0; color:#fff;">
                    <figure><img src="/assets/img/fly.webp" alt="Biblioteca" class="img-responsive center-box"
                            style="width:55%;"></figure>
                    <p class="text-center" style="padding-top: 15px;">Fly Colombia</p> <!-- ACA -->
                </div>
                <div class="full-reset nav-lateral-list-menu " style="background-color: #0971B7;">
                    <ul class="list-unstyled">
                        
                        {{--<li><a href="{{ route('reservas') }}"><i class="fas fa-book"></i>&nbsp; &nbsp; &nbsp;Gestión de
                                reserva</a></li>--}}
                         
                        
                        
                       
                        {{--<div class="flychat-max">
                            <li ><a class="flychat-max" href="{{ route('flychat') }}"><i class="zmdi zmdi-twitch"></i> &nbsp;&nbsp; Flychat</a></li>
                        </div>--}}
                        
                        {{-- <li>
                                <a class="dropdown-menu-button"><i class="fas fa-file-alt"></i>&nbsp; &nbsp; Reportes</a>
                                <ul class="list-unstyled">
                                    <li><a href="ListaEmbarque.html">&nbsp; &nbsp; Lista de embarque</a></li>
                                </ul>
                            </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-page-container full-reset custom-scroll-containers">
           
            
            @yield('content')

            <footer class="footer full-reset" style="background-color: #0971B7;">
                <div class="container-fluid">
                    <div class="row" style="background-color: #0971B7;">
                        <div class="col-xs-12 col-sm-6" style="font-size: 17px;">
                            <p style="text-align:left">
                                Fly Colombia City Tour Aeropuerto Enrique Olaya Herrera Hangar 67A Medellín - Colombia
                                <br>PBX : 57 4 444 9521 Móvil : 57 312 286 1917 - 57 301 640 2620
                                <br> e-mail: reservas@flycolombia.com.co &nbsp; &nbsp; &nbsp; directora@flycolombia.com.co
                            </p>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright full-reset all-tittles"><span>© Copyright 2020 - Fly Colombia</span></div>
            </footer>
        </div>
        
        {{-- <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script> --}}
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="https://kit.fontawesome.com/65618189ca.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        {{-- <script type="text/javascript" src="/js/personalfunctions.js"></script> --}}
        <script type="text/javascript" src="/js/apps.js"></script>
        <script type="text/javascript" src="/js/money.js"></script>
        {{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        {{-- <script src="/js/sweet-alert.min.js"></script> --}}
        @stack('scripts')
    </body>

</html>