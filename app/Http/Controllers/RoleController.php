<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.listar',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles',
            'institution'=>'required',
            'state'=> 'required'
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->institution = $request->input('institution');
        $role->state = $request->input('state');
        $role->save();


        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
            'institution'=>'required',
            'state'=> 'required'
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->institution = $request->input('institution');
        $role->state = $request->input('state');
        $role->save();


        ///return view('roles.listar')->with('success', 'Rol editado exitosamente');
        return redirect('/roles')->with('success', 'Cuenta actualizada exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect("roles");
    }
    
    public function updateState(Role $role)
    {
        $role->state = $role->state === 'Activo' ? 'Inactivo' : 'Activo';
        $role->save();

        return redirect("roles");
    }

}
