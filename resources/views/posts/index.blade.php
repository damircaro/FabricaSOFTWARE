@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Posts'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Posts</h4>
            <p class="card-category">Lista de posts registrados en la base de datos</p>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-12 text-right">
                  {{-- @can('post_create') es la condincion de roles para poder crear  --}}
                @can('post_create')
                {{--  --}}
                <a {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Añadir post" href="{{ route('posts.create') }}" class="btn btn-sm btn-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
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
                  @forelse ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="text-primary">{{ $post->created_at->toFormattedDateString() }}</td>
                    <td class="td-actions text-right">
                    @can('post_show')
                      <a {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Vista" href="{{ route('posts.show', $post->id) }}" class="btn btn-info"> <i
                          class="material-icons">person</i> </a>
                    @endcan
                    @can('post_edit')
                      <a {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('posts.edit', $post->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                    @endcan
                    @can('post_destroy')
                      <form {{-- data-toggle="tooltip" es para agregar mensaje al botón, al pasar el mouse  --}} data-toggle="tooltip" data-placement="top" title="Eliminar" action="{{ route('posts.destroy', $post->id) }}" method="post"
                        onsubmit="return confirm('Seguro de querer eliminarlo?')" style="display: inline-block;">
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
            {{ $posts->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
