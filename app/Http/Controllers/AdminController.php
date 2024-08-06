<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $emailDup = User::where('email', $request->email)->exists();

            if($emailDup === false){
                User::created([
                    'name'       => $request['name'],
                    'ap_paterno' => $request['ap_paterno'],
                    'ap_materno' => $request['ap_materno'],
                    'telefono'   => $request['telefono'],
                    'email'      => $request['email'],
                    'password'   => $request['password'],




                ]);
            }

        }
        catch(ValidationException $e)
        {

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminController $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminController $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminController $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminController $admin)
    {
        //
    }
}
