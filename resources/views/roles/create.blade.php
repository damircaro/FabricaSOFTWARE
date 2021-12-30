

@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Crear Rol</h4>
              <p class="card-category">Ingresar datos del rol</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label"><font color="black">Nombre del rol</font></label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" autocomplete="off" autofocus>
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label"><font color="black"> Permisos de roles</font> </label>
                <div class="col-sm-7">

                  <div class="form-group">
                    <input type="checkbox" onclick="toggle(this);" /><strong> Quieres seleccionar todos?</strong>
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <table class="table">
                          <tbody>
                            @foreach ($categorias as $key => $categoria)
                            <tr>
                                <td><div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{$categoria->name_category}}

                                    <span class="caret"></span></button>

                                    <ul class="dropdown-menu">
                                        @foreach ( $permissions as $id => $permission )
                                        @if ($categoria->id == $permission->category_permission_id)

                                        <li>

                                                <div class="form-check">

                                                  <label class="form-check-label">

                                                    <input  class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">

                                                    <span class="form-check-sign">
                                                      <span class="check"></span>

                                                    </span>
                                                  </label>
                                                </div>

                                                {{ $permission->name }}

                                        </li>

                                        @endif

                                        @endforeach

                                    </ul>
                                  </div></td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
        <script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

        </script>
      </div>
    </div>
  </div>
</div>
@endsection
