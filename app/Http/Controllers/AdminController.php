<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = User::whereHas('roles', function ($query){
            $query->where('name', 'Admin');
        })->paginate(10);

        $params['collection'] = $collection;
        return view('admin.index', $params);
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
                User::create([
                    'name'       => $request['name'],
                    'ap_paterno' => $request['ap_paterno'],
                    'ap_materno' => $request['ap_materno'],
                    'telefono'   => $request['telefono'],
                    'email'      => $request['email'],
                    'password'   => Hash::make($request['password']),
                ])->assignRole('Admin');

                $response = [
                    "code" => 200, "message" => "Exito"
                ];
                return redirect()->route('lista.admin')->with('success', 'Usuario agregado Correctamente!');
            }else{
                return redirect()->route('lista.admin')->with('message', 'El Correo ya existe, Ingresa uno nuevo');
            }
        }
        catch(ValidationException $e)
        {
            $response = [
                "code" => 422, "message", "error" => $e->errors()
            ];

        }
        return response()->json($response);
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
