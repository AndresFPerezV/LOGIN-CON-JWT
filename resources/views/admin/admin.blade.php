<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Panel administrador</title>

  {{-- CSS Files --}}
  <link rel="stylesheet" href="/css/fontawesome.css">

  <link rel="stylesheet" href="/css/bulma.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/css/bootstrap.css"> {{-- Google Fonts --}}
  <link
    href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
    rel="stylesheet">

</head>

<body>
  <div class="columns panelboard">
    <div class="column is-one-fifth adminsidebar">
      <aside class="menu">
        <br>
        <br>
        <div class="subtitle has-text-white has-text-centered">
          PANEL ADMINISTRADOR
        </div>
        <p class="has-text-white is-4 is-size-7 has-text-weight-bold has-text-centered is-uppercase">Bienvenido,
          </p>
        <ul class="menu-list adminlistitem">
          {{--<li><a href="/admin">Dashboard</a></li>--}}
        </ul>
       
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-users"></i> Gestión de usuarios
        </p>
        <ul class="menu-list adminlistitem">
          {{--<li><a href="{{ route('admin.logout') }}">Desconectar</a></li>--}}
        </ul>
      </aside>
    </div>
    @include('admin.dashboard')
    
  </div>

  {{-- JavaScript Files --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/fontawesome.js"></script>
  <script src="/js/bootstrap.js"></script>
  <script>
    var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
              modal.style.display = "block";
            }
            span.onclick = function() {
              modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            //Display File Name
            var input = document.getElementById( 'file-input' );
            var infoArea = document.getElementById( 'file-name' );
            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {      
            var input = event.srcElement;         
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
}
  </script>

</body>
@include('layouts.footer')
</html>