<div class="column displaybox profileback">
  @include('admin.navprofile')
  <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
    <ul>
      <li><a href="/admin">Administrador</a></li>
      <li class="is-active"><a href="/admin">Dashboard</a></li>
    </ul>
  </nav>
  <div class="subtitle has-text-black-bis">Ver todos los usuarios</div>
  <hr>
  <div class="subtitle has-text-black-bis">USUARIOS</div>
  <div class="column tableshow style=" overflow-x: auto ">   
            <table class=" table ">
              <thead>
                <tr>
                  
                  <th>Id usuario</th>
                  <th>Nombre usuario</th>
                  <th>Correo usuario</th>
                  <th>role_id</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
                  <th>Modificar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $key=>$user)
                <tr>
                    
                    <td><input type="text" id="user{{$user->id}}" value="{{$user->id}}"></td>
                    <td><input type="text"  id="name{{$user->id}}" value="{{$user->name}}"></td>
                    <td><input type="text"  id="email{{$user->id}}" value="{{$user->email}}"></td>
                    <td>
                      @if($user->role_id==NULL)
                        <input type="text" id="rol{{$user->id}}" value="Sin rol">
                      @else
                        @if($user->role_id==1)
                            <input type="text"  value="Administrador" id="rol{{$user->id}}">
                        @else
                            <input type="text"  value="Consultor" id="rol{{$user->id}}">
                        @endif
                      @endif
                    </td>
                    <td>
                        <form style=" display:inline-block" id="delus-form{{$user->id}}" method="GET" action="/eliminar">
                        @csrf
                          <input name="idee" type="text" value="{{$user->id}}" style="display:none;">
                          <button name="sentres" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form style="display:inline-block" id="editar{{$user->id}}" method="GET" action="/editar">
                        @csrf
                          <input name="id" type="text" value="{{$user->id}}" id="{{$user->id}}" style="display:none;">
                          <input type="text" name="iden" value="" style="display: none;">
                          <input type="text" name="iden2" value="" style="display:none;">
                          <input type="text" name="iden3" value="" style="display:none;">
                          <input type="text" name="iden4" value="" style="display:none;">
                          <button name="nose" class="btn btn-warning" onclick="cambiar()">Editar</button>
                          <script>
                            function cambiar(){
                              var num=document.getElementById("id").value;
                            document.getElementById("iden").value=document.getElementById("name"+num).value;
                            document.getElementById("iden2").value=document.getElementById("email"+num).value;
                            document.getElementById("iden4").value=document.getElementById("rol"+num).value;
                            }
                          </script>
                        </form>
                    </td>
                    <td><button name="campos" class="btn btn-info" onclick="editar()">Modificar campos</button></td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>

  <script>
    function editar() {
      event.preventDefault();
      Swal.fire({
        title: "EDITAR USUARIO",
        icon: 'info',
        html: '    &nbsp;&nbsp;&nbsp;Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="dd" class="swal2-input" type="text" value="{{$user->id}}">' +
          '<br>Nombre:<input id="name" class="swal2-input" type="text">' +
          '<br>Correo:&nbsp;&nbsp;<input id="email" class="swal2-input" type="text">' +
      '<br>Contraseña:<input id="pass" class="swal2-input" type="text">' +
      '<br>Rol User:<input id="rol" class="swal2-input" type="text">',
        showCancelButton: true,
        confirmButtonColor: "#1FAB45",
        confirmButtonText: "Enviar",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#DD6B55",
        buttonsStyling: true
        
      }).then(resultado => {
       
        if (resultado.value) {
          var id = $('#dd').val();
          var iden = $('#name').val();
          var iden2 = $('#email').val();
          var iden3 = $('#pass').val();
          var iden4 = $('#rol').val();
          document.getElementById("iden").value=iden;
          document.getElementById("iden2").value=iden2;
          document.getElementById("iden3").value=iden3;
          document.getElementById("iden4").value=iden4;
          document.getElementById("id").value=id;
        }
      });
    }
  </script>
</div>