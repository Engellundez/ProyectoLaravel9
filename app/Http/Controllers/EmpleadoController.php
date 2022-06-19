<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$empleados = Empleado::paginate(5);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validar = [
			'nombre' => 'required|string|max:100',
			'primer_apellido' => 'required|string|max:100',
			'segundo_apellido' => 'required|string|max:100',
			'correo' => 'required|email',
			'foto' => 'required|max:10000|mimes:jpeg,mng,jpg',
		];

		$mensaje = [
			'required' => 'El :attribute es requerido',
			'email'	=> 'El :attribute debe ser un correo como "...@gmail.com" o "...@hotmail.com"',
			'foto.required' => 'La foto es requerida',
		];

		$this->validate($request, $validar,$mensaje);

        $datosEmpleado = request()->all();

        // $datosEmpleado = $request->except("_token");
		// Empleado::insert($datosEmpleado);

		$empleado = new Empleado;
		$empleado->nombre = $request->nombre;
		$empleado->primer_apellido = $request->primer_apellido;
		$empleado->segundo_apellido = $request->segundo_apellido;
		$empleado->correo = $request->correo;
		// $empleado->foto = $request->foto;
		if($request->hasFile('foto')){
			$empleado->foto = $request->file('foto')->store('uploads', 'public');
		}
		$empleado->save();
		return redirect('empleado')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$empleado = Empleado::findOrFail($id);

        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$validar = [
			'nombre' => 'required|string|max:100',
			'primer_apellido' => 'required|string|max:100',
			'segundo_apellido' => 'required|string|max:100',
			'correo' => 'required|email',
			'foto' => 'max:10000|mimes:jpeg,mng,jpg',
		];

		$mensaje = [
			'required' => 'El :attribute es requerido',
			'email'	=> 'El :attribute debe ser un correo como "...@gmail.com" o "...@hotmail.com"',
			'foto.required' => 'La foto es requerida',
		];

		$this->validate($request, $validar,$mensaje);


        $empleado = Empleado::findOrFail($id);
		$empleado->nombre = $request->nombre;
		$empleado->primer_apellido = $request->primer_apellido;
		$empleado->segundo_apellido = $request->segundo_apellido;
		$empleado->correo = $request->correo;
		// $empleado->foto = $request->foto;
		if($request->hasFile('foto')){
			Storage::delete('public/'.$empleado->foto);
			$empleado->foto = $request->file('foto')->store('uploads', 'public');
		}
		$empleado->save();

		return redirect('empleado')->with('mensaje', 'El empleado a sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
		if(Storage::delete('public/'.$empleado->foto)){
			$empleado->delete();
			// $empleadoDelete->forceDelete();
		};
		return redirect('empleado')->with('mensaje', 'El empleado se a eliminado :(');
    }
}
