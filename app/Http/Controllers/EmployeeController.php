<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $employees = Employee::orderBy('id','desc')->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('employees.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        Employee::create($request->post());

        return redirect()->route('employees.index')->with('success','Employee has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function show(Employee $Employee)
    {
        return view('employees.show',compact('Employee'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function edit(Employee $Employee)
    {
        return view('employees.edit',compact('Employee'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Employee $Employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $Employee->fill($request->post())->save();

        return redirect()->route('employees.index')->with('success','Employee Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function destroy(Employee $Employee)
    {
        $Employee->delete();
        return redirect()->route('employees.index')->with('success','Employee has been deleted successfully');
    }
}