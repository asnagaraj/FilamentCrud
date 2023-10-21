<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
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
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|integer',
            'manufacturer'=>'required|string',
            'technologies'=>'required|string',
            
        ]);
       $student=Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'manufacturer'=>$request->manufacturer,
            'technologies'=>$request->technologies,
       ]);
       return $student;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'manufacturer'=>'required',
            'technologies'=>'required',
        ]);
        
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->manufacturer=$request->manufacturer;
        $student->technologies=$request->technologies;
        $student->save();
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null,204);
    }
}
