<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cartas'] = Carta::paginate(5);
        return view('carta.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $datosCarta = request()->except('_token');

        if($request->hasFile('foto')){
            $datosCarta['foto'] = $request->file('foto')->store('uploads','public');
        }

        Carta::insert($datosCarta);
        return redirect('carta')->with('Mensaje', 'Carta agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function show(Carta $carta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $carta = Carta::findOrFail($id);
        return view('carta.edit', compact('carta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCarta = request()->except(['_token', '_method']);
        
        if($request->hasFile('foto')){
            $carta = Carta::findOrFail($id);
            Storage::delete('public/'.$carta->foto);
            $datosCarta['foto'] = $request->file('foto')->store('uploads','public');
        }

        Carta::where('id', $id)->update($datosCarta);
        $carta = Carta::findOrFail($id);
        return view('carta.edit', compact('carta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $carta = Carta::findOrFail($id);
        if(Storage::delete('public/'.$carta->foto)){
            Carta::destroy($id);
        }
        return redirect('carta');
    }
    
}

