<?php

namespace App\Http\Controllers\Users;

use App\Models\PreparacionConstante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreparacionConstanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //solo recuperar los registros del id logeado
        $preparacion_const = PreparacionConstante::all();
        //return view('users.preparacion_constante.index', compact('preparacion_const'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
