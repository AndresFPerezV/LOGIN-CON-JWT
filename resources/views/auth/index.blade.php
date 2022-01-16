<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuario</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css"> {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">

</head>

<body class="grayme">

    <div class="column is-full colorbar">
    </div>
    <br>
    <div class="columns fulllogin">
        <div class="column is-offset-1 is-half leftsideeffect">

            <div class="is-mobile textboxlogin">
                <p class="title has-text-primary is-4 has-text-centered">Registrarse en el sistema</p>
                <p class="subtitle  has-text-centered is-size-7 tinytextlogin">Ingresa tu correo electrónico y contraseña.</p>
            </div>
            <div class="loginform">
                <form method="POST" id="form-registro" enctype="form-data">
                    @csrf
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('name') ? ' is-danger' : '' }} is-primary inputline is-medium" id="name" type="text" value="{{ old('name') }}" name="name" placeholder="Nombre" autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span> @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('name') }}</strong>
                            </span> @endif
                        </p>
                    </div>

                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input {{ $errors->has('email') ? ' is-danger' : '' }} is-primary inputline is-medium" id="email" type="email" value="{{ old('email') }}" name="email" placeholder="Email Address" autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('email') }}</strong>
                            </span> @endif
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('password') ? ' is-danger' : '' }} is-primary inputline is-medium" id="password" type="password" name="password" placeholder="Contraseña" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </p>
                    </div>

                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="password_confirmation" type="password" class="input is-primary inputline is-medium" name="password_confirmation" placeholder="Confirmar contraseña" required >
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>

                   

                </form>
                @if(session()->has('message'))
                <div class="">
                    <h1 class="is-size-7 has-text-weight-bold has-text-danger"><b> {{ session()->get('message') }}</b></h1>
                </div>
                @endif
                <div class="field ">
                        <p class="control has-text-centered is-centered loginbutton">
                            <button  class="button is-primary is full is-uppercase" onclick="registrar();">
                                &nbsp; &nbsp; &nbsp; &nbsp; Inscribirse &nbsp; &nbsp; &nbsp; &nbsp;
                            </button>
                        </p>
                    </div>
            </div>
        </div>
        <div class="column is-one-third rightsideeffect has-background-primary">
            <div class="is-mobile textboxlogin textareabox">
                <p class="title has-text-white is-4 has-text-centered">Hola, señor usuario</p>
                <p class="subtitle  has-text-white has-text-centered is-size-7 tinytextlogin">Ingresa por favor tus datos.</p>

            </div>
            <div class="is-centered has-text-centered">
                <a class="button is-invertedis-uppercase is-outlined signupbuttonloginpage" href="login">&nbsp; &nbsp;
                    &nbsp; &nbsp; Ingresar &nbsp; &nbsp; &nbsp; &nbsp;</a>
            </div>

        </div>
    </div>


    {{-- Footer --}}
    @include('layouts.footer')
    
</body>

{{-- JavaScript Files --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script>
        function registrar() {
            console.log("hola mundo");
            var nombre=document.getElementById("name").value;
            var correo=document.getElementById("email").value;
            var contraseña=document.getElementById("password").value;
            var confirmar=document.getElementById("password_confirmation").value;
            var bandera;
            bandera=validar();
            if(bandera==true){
                payload = {
                'name': nombre,
                'email': correo,
                'password': contraseña,
                'password_confirmation': confirmar
            };
            var form_data = new FormData(document.getElementById("form-registro"));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://127.0.0.1:8000/api/auth/register", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 201) {
                    var json = JSON.parse(xhr.responseText);
                    //console.log(json);
                    if (json.message == "User successfully registered") { //no errors
                        Swal.fire({
                            icon: 'success',
                            title: '¡Buen trabajo..!',
                            text: 'Se ha registrado correctamente'
                        });
                    } else {
                        console.log("no se pudo registrar");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El usuario no se pudo registrar de manera correcta'
                        });
                    }
                }
            };
            //encode task payload into JSON
            var data = JSON.stringify(payload);
            xhr.send(data);
            document.getElementById("name").value="";
            document.getElementById("email").value="";
            document.getElementById("password").value="";
            document.getElementById("password_confirmation").value="";
            }
            
        };

        function validar(){
            var bandera=true;
            if(document.getElementById("name").value==""){
                Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Señor usuario falta ingresar el nombre de usuario'
                        });
                bandera=false;
            }

            if(document.getElementById("email").value==""){
                Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Señor usuario debe ingresar su correo electronico'
                        });
                        bandera=false;
            }
            
            if(document.getElementById("password").value==""){
                Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Señor usuario debe ingresar su contraseña'
                        });
                        bandera=false;
            }
            
            if(document.getElementById("password_confirmation").value==""){
                Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Señor usuario debe confirmar su contraseña'
                        });
                        bandera=false;
            }
            return bandera;
        }
    </script>

</html>