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
        @if(Auth::user()->role == 'Administrador')
            @php
                $isAdmin=true;
            @endphp
        @else
            @php
                $isAdmin=false;
            @endphp
        @endif

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
                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> &nbsp;&nbsp; Inicio</a></li>
                        @if($isAdmin)
                        <li><a href="{{ route('experiencias') }}"><i class="fas fa-smile-beam"></i>&nbsp; &nbsp; Gestión de
                                experiencias</a></li>
                        <li><a href="{{ route('bonificaciones') }}"><i class="fas fa-money-check-alt"></i>&nbsp; &nbsp;
                            Bonificaciones</a></li> 
                        <li><a href="{{ route('valores') }}"><i class="fas fa-cheese"></i>&nbsp; &nbsp; Valores
                                agregados</a></li>
                        <li><a href="{{ route('complementos') }}"><i class="fas fa-wine-bottle"></i>&nbsp; &nbsp;
                                Complementos emotivos</a></li>
                        <li><a href="{{ route('usuarios') }}"><i class="fas fa-user"></i> &nbsp; &nbsp; Gestión de
                                usuarios</a></li>
                        <li><a href="{{ route('graficas') }}"><i class="fas fa-chart-pie"></i> &nbsp; &nbsp; Informes Gerenciales</a></li> 
                        @endif
                        @if(!$isAdmin)
                        <li><a href="{{ route('editarusuariovista') }}"><i class="fas fa-user"></i> &nbsp; &nbsp; Mi
                                usuario</a></li>
                        @endif
                        <li><a href="{{ route('reservas') }}"><i class="fas fa-book"></i>&nbsp; &nbsp; &nbsp;Gestión de
                                reserva</a></li>
                         <li><a href="{{ route('listaembarque') }}"><i class="fas fa-file-alt"></i>&nbsp; &nbsp; &nbsp; Vuelos</a></li>
                        @if($isAdmin)
                        <li><a href="{{ route('vuelos') }}"><i class="fas fa-plane"></i> &nbsp; &nbsp;Gestión de vuelos</a>
                        </li>
                        <li><a href="{{ route('listarvuelos') }}"><i class="fas fa-exclamation-circle"></i>&nbsp;
                                &nbsp;&nbsp;Priorizar vuelo</a></li>
                        <li><a href="{{ route('pilotos') }}"><i class="fas fa-user-friends"></i>&nbsp; &nbsp;
                            Pilotos</a></li>
                        <li><a href="{{ route('aeronaves') }}"><i class="fas fa-helicopter"></i>&nbsp; &nbsp;Gestión de
                                aeronaves</a></li>
                        <li><a href="{{ route('proveedores') }}"><i class="fas fa-briefcase"></i>&nbsp; &nbsp;
                                Proveedores</a></li>
                       
                        
                        @endif
                        <div class="flychat-max">
                            <li ><a class="flychat-max" href="{{ route('flychat') }}"><i class="zmdi zmdi-twitch"></i> &nbsp;&nbsp; Flychat</a></li>
                        </div>
                        
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
            <p style="display: none;" id="demo"></p> <!-- Muestra la hora actual -->
            <p style="display: none;" id="demo2"></p><!-- Muestra el mensaje a las 7:00:00 -->
            <input type="text" style="display: none;" id="asesor" value="{{ Auth::user()->name }}">
                <nav class="navbar-user-top full-reset">
                <ul class="list-unstyled full-reset" style="background-color: #0971B7;">
                    <!--AQUI -->
                    <figure>
                        @if(Auth::user()->foto != Null)
                            @php
                                $existe=False;
                                $file2= str_replace('/','\\',Auth::user()->foto);
                                $file_path = public_path(). $file2;
                                $file_path = str_replace('\\','/',$file_path);
                                if(file_exists($file_path)){
                                    $existe=True;
                                }
                            @endphp
                            @if($existe)
                                <img src="{{Auth::user()->foto}}" alt="user" class="img-responsive img-circle center-box">
                            @else
                                <img src="/assets/img/noimage.png" alt="user" class="img-responsive img-circle center-box">
                            @endif
                        @else
                            <img src="/assets/img/user01.png" alt="user" class="img-responsive img-circle center-box">
                        @endif
                    </figure>
                    <li style="color:#fff; cursor:default;"><span class="all-tittles">{{ Auth::user()->name }} </span></li>
                    
                    <li class="tooltips-general exit-system-button" data-href="{{ route('logout') }}"
                        data-placement="bottom" title="Salir del sistema"><i class="zmdi zmdi-power"></i></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li class="mobile-menu-button visible-xs" style="float: left !important;"><i class="zmdi zmdi-menu"></i>
                    </li>
                    <!--<li class="tooltips-general" data-href="{{ route('flychat') }}"
                        data-placement="bottom" title="chat"><i class="zmdi zmdi-twitch"></i></li>-->
                    <li><a class="flychat-icon" title="Flychat" href="{{ route('flychat') }}"><i class="zmdi zmdi-twitch"></i></a></li>
                    @if($isAdmin)
                    <li><a class="flychat-icon"  data-toggle="modal" data-target="#myModal"><i class="zmdi zmdi-format-italic"></i></a></li>
                    
                    @endif
                    
                </ul>
            </nav>
            
              
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center all-tittles">iva actual</h4>
                            <h4 class="modal-title text-center all-tittles" id="iva2"></h4>
                        </div>
                        <form id="form-iva" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <br>
                                <div class="container-fluid">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="group-material">
                                                <input type="number" value=""
                                                    class="material-control tooltips-general @error('valor') is-invalid @enderror"
                                                    placeholder="Ingrese el valor del nuevo iva" required=""
                                                    maxlength="70" data-toggle="tooltip" data-placement="top"
                                                    name="valor" value="{{ old('valor') }}" required
                                                    autocomplete="valor" autofocus>
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>IVA </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                {{--<input name="idee" type="text" value="{{$prove->id}}"
                                    style="display:none;">--}}
                            </div>
                            <div class="modal-footer">
                                <button id="{{--Proveedor-Editar-{{$prove->id" onclick="guardariva()"--}} type="submit" class="btn btn-primary "><i
                                    class="zmdi zmdi-floppy"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                        class="zmdi zmdi-close-circle"></i> &nbsp; Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
        {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>--}}
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script>
            var arr=[];
            var iva=[];
            var myVar = setInterval(function(){ myTimer() }, 1000);
            function myTimer(obj) {
                    
                    
                    var hora = new Date();
                    var myhora = hora.toLocaleTimeString();
                    
                    document.getElementById("demo").innerHTML = "Son las " + myhora + " horas";
                    
                    //console.log(arr);
                    for (x of arr) {
                            if(x.hora==myhora){
                                Swal.fire({
                                    title: 'Opss...',
                                    text: "reserva a punto de caducar",
                                    icon: 'warning',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'información'
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            title: 'Nombre del cliente: '+x.nombre,
                                            text: 'Celular: '+x.celular,
                                            icon: 'warning',
                                        }
                                            
                                        )
                                    }
                                    })
                            }
                    }
                   
            }
            window.addEventListener("load", function() { 
                var ase=$("#asesor").val();
                    $.ajax({
                        type: 'GET', //THIS NEEDS TO BE GET
                        url: '/listar',
                        dataType: 'json',
                        success: function (data) {
                            if(data){
                                for (x of data) {
                                    if(x.asesor==ase){
                                        arr.push(x);
                                    }
                                }
                            }
                            //myTimer(data);                   
                        },
                        error: function() { 
                            //console.log(data);
                        }
                    });
                    
            });
            window.addEventListener("load", function() { 
                //var ase=$("#asesor").val();
                    $.ajax({
                        type: 'GET', //THIS NEEDS TO BE GET
                        url: '/veriva',
                        dataType: 'json',
                        success: function (data) {
                            

                            //console.log(data);
                            var ase=$("#iva2").html(data+" %");
                                          
                        },
                        error: function() { 
                           
                        }
                    });
                    
            });
            $("#form-iva").submit(function(e) {
                e.preventDefault(); 
                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: "/cambiariva",
                    data: form.serialize(), 
                }).done(function(res){
                        if(res.error){
                            mostrarErrores = convertirLista(res.error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: mostrarErrores,
                                
                            })
                        
                        }else if(res&&res.ok=='true'){
                            console.log("hola");
                            Swal.fire({
                                icon: 'success',
                                title: '¡Buen trabajo..!',
                                text: 'Se ha actualizado correctamente el iva'
                                });
                            location.reload();
                                //limpiar();
                                //$('#Modaledit').modal('hide'); 
                                
                        
                        }
                    });
                });
            

            
            
             
        </script>
        {{-- <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script> --}}
        
        {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}   
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