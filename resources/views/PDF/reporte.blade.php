<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de usuarios</title>
<style>
  #emp{
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  #emp td,#emp th{
    border: 1px solid rgb(243, 81, 6);
    padding:8px;
  }

    #emp td{
      padding-bottom: 12px;
    text-align: left;
    background-color: white;
    color:black;}


</style>

  </head>
<body>
     <div class="container">
       <h1> <img id="logo" src="img/sena23.png" width="70" alt="Logo">Usuarios</h1>
        <table id="emp">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre_usuario</th>
                <th>Correo</th>
                <th>Fecha de creacion</th>
                <th>User name</th>
                <th>roles</th>
              </tr>
            </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->username}}</td>

                <td>
                    @forelse ($user->roles as $role)
                      <span class="badge badge-info">{{ $role->name }}</span>
                    @empty
                      <span class="badge badge-danger">No roles</span>
                    @endforelse
                 </td>
            </tr>
                 @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
