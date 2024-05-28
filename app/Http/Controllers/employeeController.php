<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class employeeController extends Controller
{
    public function index()
    {
        $employ = Employee::get();
        return view('employee.index', compact('employ'));
    }

    public function create()
    {
        return view('employee.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'required',
            'dob' => 'required',
        ]);

        Employee::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'dob' => $request->dob 
        ]);

        return redirect('employee')->with('status','Employee Add');
    }

    public function edit(int $id)
    {
        $employ = Employee::find($id);
        return view('employee.edit', compact('employ'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'firstname' => 'required|max225',
            'lastname' => 'required|max225',
            'phone' => 'required',
            'dob' => 'required', 
        ]);

        Employee::findOrFail($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'dob' => $request->dob,  
        ]);

        return redirect()->back()->with('status','Employee Update');
    }
}