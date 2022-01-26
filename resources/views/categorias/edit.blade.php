@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Editar Categoria'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar categoria</h4>
              <p class="card-category">Editar datos de la categoria</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label"style="color:#000000">Nombre Categoria</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name_category" placeholder="Ingrese la categoria"
                    value="{{ old('name_category', $categoria->name_category) }}" autocomplete="off" autofocus>
                </div>
              </div>
            </div>
            <!--End body-->
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
