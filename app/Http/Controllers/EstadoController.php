<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

/**
 * Class EstadoController
 * @package App\Http\Controllers
 */
class EstadoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-estado|crear-estado|editar-estado|borrar-estado',['only'=>['index']]);
        $this->middleware('permission:crear-estado',['only'=>['create','store']]);
        $this->middleware('permission:editar-estado',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-estado',['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estado = $request->get('buscarporestado');
        $estados = Estado::where('estado',  'like', "%$estado%")->paginate(5);

        return view('estado.index', compact('estados'))
            ->with('i', (request()->input('page', 1) - 1) * $estados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = new Estado();
        return view('estado.create', compact('estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estado::$rules);

        $estado = Estado::create($request->all());

        return redirect()->route('estados.index')
            ->with('success', 'Estado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::find($id);

        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);

        return view('estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estado $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        request()->validate(Estado::$rules);

        $estado->update($request->all());

        return redirect()->route('estados.index')
            ->with('success', 'Estado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estado = Estado::find($id)->delete();

        return redirect()->route('estados.index')
            ->with('success', 'Estado deleted successfully');
    }
}
