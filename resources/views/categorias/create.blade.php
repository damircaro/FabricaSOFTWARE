@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Nueva categoria'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('categorias.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Categorias</h4>
              <p class="card-category">Ingresar datos de la nueva categoria</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name_category" class="col-sm-2 col-form-label"style="color:#000000">Nombre de categoria</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name_category" placeholder="Ingrese nombre categoria"
                    autocomplete="off" autofocus>
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
      </div>
    </div>
  </div>
</div>
@endsection
