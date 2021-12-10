<?php

namespace App\Http\Controllers;

use App\Models\Resguardo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;

/**
 * Class ResguardoController
 * @package App\Http\Controllers
 */
class ResguardoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-resguardo|crear-resguardo|editar-resguardo|borrar-resguardo',['only'=>['index']]);
        $this->middleware('permission:crear-resguardo',['only'=>['create','store']]);
        $this->middleware('permission:editar-resguardo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-resguardo',['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resguardo = $request->get('buscarporresguardo');

        $resguardos = Resguardo::where('nombre_solicitante',  'like', "%$resguardo%")->paginate(5);

        return view('resguardo.index', compact('resguardos'))
            ->with('i', (request()->input('page', 1) - 1) * $resguardos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resguardo = new Resguardo();
        $users = User::pluck('name','id');
        $areas = Area::pluck('name','id');
        return view('resguardo.create', compact('resguardo','users','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Resguardo::$rules);

        $resguardo = Resguardo::create($request->all());

        return redirect()->route('resguardos.index')
            ->with('success', 'Resguardo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resguardo = Resguardo::find($id);

        return view('resguardo.show', compact('resguardo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resguardo = Resguardo::find($id);
        $users = User::pluck('name','id');
        $areas = Area::pluck('name','id');
        return view('resguardo.edit', compact('resguardo','users','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Resguardo $resguardo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resguardo $resguardo)
    {
        request()->validate(Resguardo::$rules);

        $resguardo->update($request->all());

        return redirect()->route('resguardos.index')
            ->with('success', 'Resguardo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $resguardo = Resguardo::find($id)->delete();

        return redirect()->route('resguardos.index')
            ->with('success', 'Resguardo deleted successfully');
    }
}
