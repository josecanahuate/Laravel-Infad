<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDato;
use Illuminate\Http\Request;

class UserDatosController extends Controller
{

    public function edit(UserDato $dato)
    {
        /* $user = User::findOrFail($dato->user_id); */
        return view('users.datos.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDato $dato)
    {
        $user = User::findOrFail($dato->user_id);
    
        $dato->update($request->all());
    
        return redirect()->route('users.datos.edit', $dato->id)->with('success', 'Datos actualizados correctamente');
    }
}
