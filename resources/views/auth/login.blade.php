<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css"> {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

</head>

<body class="grayme">

    <div class="column is-full colorbar">
        {{-- top color bar goes here --}}
    </div>
    <br>
    <div class="columns fulllogin">
        <div class="column is-offset-1 is-half leftsideeffect">
            <div class="is-mobile textboxlogin">
                <p class="title has-text-primary is-4 has-text-centered">Iniciar sesión en su cuenta</p>
                <p class="subtitle  has-text-centered is-size-7 tinytextlogin">Ingrese su correo electrónico y contraseña para iniciar sesión
                    su cuenta.</p>
            </div>
            <div class="loginform">
                <form method="POST" id="form-login" enctype="form-data">
                    @csrf
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input
                                class="input {{ $errors->has('email') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="email" type="email" value="{{ old('email') }}" name="email" placeholder="Email"
                                autofocus>
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
                            <input
                                class="input {{ $errors->has('password') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="password" type="password" name="password" placeholder="Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </p>
                    </div>
                    <div class="has-text-centered loginbutton">
                        @if (Route::has('password.request'))
                        <a class="has-text-link has-text-centered" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a> @endif
                    </div>
    </form>
    <div class="field ">
        <p class="control has-text-centered is-centered loginbutton">
            <button class="button is-primary is full is-uppercase" onclick="login();">
                &nbsp; &nbsp; &nbsp; &nbsp; Iniciar &nbsp; &nbsp; &nbsp; &nbsp;
            </button>
        </p>
    </div>
    @if(session()->has('message'))
            <div class="">
                <h1 class="is-size-7 has-text-weight-bold has-text-danger"><b> {{ session()->get('message') }}</b></h1>
            </div>
            @endif
    
    </div>
    </div>
    <div class="column is-one-third rightsideeffect has-background-primary">
        <div class="is-mobile textboxlogin textareabox">
            <p class="title has-text-white is-4 has-text-centered">Hola, señor usuario</p>
            <p class="subtitle  has-text-white has-text-centered is-size-7 tinytextlogin">Si no tienes cuenta puedes registrarte pincha el boton de abajo</p>

        </div>
        <div class="is-centered has-text-centered">
            <a class="button is-invertedis-uppercase is-outlined signupbuttonloginpage" href="user">&nbsp; &nbsp;
                &nbsp; &nbsp; Registrarse &nbsp; &nbsp; &nbsp; &nbsp;</a>
        </div>

    </div>
    </div>


    {{-- Footer --}}
    @include('layouts.footer')
   
</body>
{{-- JavaScript Files --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script>
        function login() {
            var correo=document.getElementById("email").value;
            var contraseña=document.getElementById("password").value;
            var bandera;
            bandera=validar();
            if(bandera==true){
                payload = {
                'email': correo,
                'password': contraseña,
            };
            //var form_data = new FormData(document.getElementById("form-registro"));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://127.0.0.1:8000/api/auth/login", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    console.log(json);
                    if (json.token_type == "bearer") { //no errors
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
            document.getElementById("email").value="";
            document.getElementById("password").value="";
            window.location.href = "admin";
            }
        };

        function validar(){
            var bandera=true;
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
            
            return bandera;
        }
    </script>
</html>
