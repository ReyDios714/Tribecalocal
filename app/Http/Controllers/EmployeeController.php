<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('user')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::all();
        return view('employees.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'rfc' => 'required|string|max:255',
            'curp' => 'required|string|max:255',
            'birthday' => 'required|date',
            'employee_type' => 'required|string',
            'position' => 'required|string',
            'date_of_joining' => 'required|date',
            'monthly_salary' => 'required|numeric',
            'service_commission' => 'nullable|numeric',
            'product_commission' => 'nullable|numeric',
        ]);

        $employee = Employee::create($request->all());

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $path = $attachment->store('attachments');
                // Guardar la ruta del archivo en la base de datos si es necesario
            }
        }

        return redirect()->route('employees.index')->with('success', 'Empleado registrado exitosamente.');
    }
}
