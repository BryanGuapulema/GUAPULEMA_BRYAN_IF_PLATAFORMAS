<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::with('user')->get();   
        return view('periods.listar', compact('periods'));
    }

    public function create()
    {
        return view('periods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'period_name' => 'required|string|max:30|unique:periods',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'state' => 'string',
        ]);

        $period = new Period();
        $period->period_name = $request->input('period_name');
        $period->start_date = $request->input('start_date');
        $period->end_date = $request->input('end_date');
        $period->save();

        return redirect()->route('periods.index');
    }

    public function edit($id)
    {
        $period = Period::findOrFail($id);
        return view('periods.edit', compact('period'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'period_name' => 'required|string|max:30|unique:periods,period_name,'.$id,
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'state' => 'string',
        ]);

        $period = Period::findOrFail($id);
        $period->period_name = $request->input('period_name');
        $period->start_date = $request->input('start_date');
        $period->end_date = $request->input('end_date');

        $user_id = Auth::id();        
        // Asignar al campo 'usermodifica'    
        $period->user_modifica = $user_id;

        $period->save();

        return redirect()->route('periods.index');
    }

    public function destroy($id)
    {
        $period = Period::findOrFail($id);
        $period->delete();

        return redirect()->route('periods.index');
    }

    public function updateState(Period $period)
    {
        $period->state = $period->state === 'Activo' ? 'Inactivo' : 'Activo';
        $period->save();

        return redirect()->route('periods.index');
    }
}
