<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
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
            'address'=>'required|string',
            'phone'=>'required|string',
            'is_published'=>'required|string'
        ]);
        $company=Company::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'address'=> $request->address,
            'phone'=>$request->phone,
            'is_published'=> $request->is_published,
        ]);
        return $company;
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'is_published' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);       
        }
        $company->name = $input['name'];
        $company->email = $input['email'];
        $company->address = $input['address'];
        $company->phone = $input['phone'];
        $company->is_published = $input['is_published'];
        $company->save();
        
        return $company;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
