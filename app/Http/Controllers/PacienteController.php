<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Genero;
use App\Models\Paciente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index', [
            'pacientes' => Paciente::with('tipoDocumento', 'genero', 'departamento', 'municipio')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create', [
            'tipoDocumentos' => TipoDocumento::all(),
            'generos' => Genero::all(),
            'departamentos' => Departamento::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }
        Paciente::create($data);
        return redirect()->back()->with('success', 'Paciente registrado con exito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'), [
            'tipoDocumentos' => TipoDocumento::all(),
            'generos' => Genero::all(),
            'departamentos' => Departamento::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->update($request->all());
        return redirect()->back()->with('success', 'Paciente actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->back()->with('success', 'Paciente eliminado con exito!!');
    }

    public function changePhoto(Request $request, Paciente $paciente)
    {
        if ($request->hasFile('foto')) {
            if ($paciente->foto) {
                Storage::disk('public')->delete($paciente->foto);
            }
            $paciente->foto = $request->file('foto')->store('fotos', 'public');
            $paciente->save();
            return redirect()->back()->with('success', 'La foto del paciente ha sido actualizada con exito!!');
        }
    }

}
