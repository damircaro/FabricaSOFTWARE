<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categoria_index'), 403);

        $categorias = Categoria::paginate(5);
        return view('categorias.index', compact('categoria'));
    }

    public function create()
    {
        abort_if(Gate::denies('categoria_index'), 403);

        return view('categorias.create');

    }

    public function store(Request $request)
    {
        Categoria::create($request->all());

        return redirect()->route('categorias.index');
    }

    public function show(Categoria $categoria)
    {
        abort_if(Gate::denies('categoria_show'), 403);

        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        abort_if(Gate::denies('categoria_edit'), 403);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());

        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        abort_if(Gate::denies('categoria_destroy'), 403);

        // $post->delete();

        // return redirect()->route('posts.index');
        if (auth()->user()->id == $categoria->id) {
            return redirect()->route('categorias.index');
        }

        $categoria->delete();
        return back()->with('succes', 'Se elimino correctamente');

    }




}
