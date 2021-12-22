@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'categorias'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Categoria</h4>
            <p class="card-category">Lista de Categorias registrados en la base de datos</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-right">
                @can('categoria_create')
                {{--  --}}
                <a {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Añadir categoria" href="{{ route('categorias.create') }}" class="btn btn-sm btn-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                    <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                    <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                  </svg></a>
                @endcan
              </div>
            </div>
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Fecha de creación </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($categorias as $categoria)
                  <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name_category }}</td>
                    <td class="text-primary">{{ $categoria->created_at->toFormattedDateString() }}</td>
                    <td class="td-actions text-right">
                    @can('categoria_show')
                      <a {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Vista" href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info"> <i
                          class="material-icons">person</i> </a>
                    @endcan
                    @can('categoria_edit')
                      <a {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                    @endcan
                    @can('categoria_destroy')
                      <form {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Eliminar" action="{{ route('categorias.destroy', $categoria->id) }}" method="post"
                        onsubmit="return confirm('Estas seguro de querer eliminar?')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $categorias->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
