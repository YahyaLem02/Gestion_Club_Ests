<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adehrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // voir liste des reclamation + la poussibilite de modifier et supprimer un reclmation
        $profile=Auth::user();
        return view("profile.index",["profile"=> $profile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $profile)
    {
        $user=User::findorfail($profile);
        return view('profile.update_profile',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        validator($request->all());
        $user=User::findorfail($id);
        $user->name= $request->name;
        $user->age= $request->age;
        $user->sexe= $request->sexe;
        $user->Profession= $request->Profession;
        $user->DateNaissance= $request->DateNaissance;
        $user->update();
        return redirect('profile')->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
