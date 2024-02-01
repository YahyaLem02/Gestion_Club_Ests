<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index', ['users' => User::all()]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $admin)
    {
        // change the role of users
        $admin = User::find($admin);
        if ($admin->isadmin == 0) {
            $admin->isadmin = 1;
        } else {
            $admin->isadmin = 0;
        }
        $admin->update();
        return redirect()
            ->route('admin.index')
            ->with('success', 'Opération a été effectué avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user)
    {
        try {
            $admin = User::find($user);
            $admin->delete();
            return redirect()
                ->route('admin.index')
                ->with('success', 'Utilisateur supprimé avec succès!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()
                    ->route('admin.index')
                    ->with('error', 'Cet utilisateur est lié à d\'autres clubs et ne peut pas être supprimé.');
            }
        }
    }
}
