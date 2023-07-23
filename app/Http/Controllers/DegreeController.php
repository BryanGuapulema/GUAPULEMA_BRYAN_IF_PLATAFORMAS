<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DegreeController extends Controller
{
    public function index()
    {
        $degrees = Degree::with('user')->get();
        return view('degrees.listar', compact('degrees'));
    }

    public function create()
    {
        return view('degrees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree_name' => 'required|string|max:50|unique:degrees',            
            'faculty' => 'string|required',
        ]);

        $degree = new Degree;
        $degree->degree_name = $request->input('degree_name');
        $degree->faculty = $request->input('faculty');
        $degree->save();

        return redirect()->route('degrees.index')->with('success', 'Degree created successfully');
    }

    public function edit($id)
    {
        $degree = Degree::findOrFail($id);
        return view('degrees.edit', compact('degree'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'degree_name' => 'required|string|max:50|unique:degrees,degree_name,'.$id,
            'faculty' => 'string|required',
        ]);

        $degree = Degree::findOrFail($id);
        $degree->degree_name = $request->input('degree_name');
        $degree->faculty = $request->input('faculty');
        // Obtener el id del usuario autenticado        
        $user_id = Auth::id();        

        // Asignar al campo 'usermodifica'    
        $degree->user_modifica = $user_id;
        #$degree->save();
        $degree->save();

        return redirect()->route('degrees.index');        
    }

    public function destroy($id)
    {
        $degree = Degree::findOrFail($id);
        $degree->delete();

        return redirect()->route('degrees.index');
    }

    public function updateState(Degree $degree)
    {
        $degree->state = $degree->state === 'Activo' ? 'Inactivo' : 'Activo';
        $degree->save();

        return redirect()->route('degrees.index');
    }
}
