<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('root');
    }
    public function index()
    {
        $clubs = Club::all();
        $users = User::all()->where('isadmin', 1);

        // Trigger a success alert using SweetAlert
        Alert::success('Success', 'Data loaded successfully!');
        return view('Club.index', ['clubs' => $clubs, 'admins' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->where('isadmin', 1);
        return view('Club.newClub', ['admins' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'club_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|file',
        ]);

        $Club = new Club();
        $Club->name = $request->input('club_name');
        $Club->description = $request->input('description');
        echo 'kjlkn';
        $slug = str::slug($request->title, '-');
        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images/club'), $newImageName);
        $Club->image = $newImageName;
        $Club->admin_id = $request->input('admin_id');
        $Club->save();
        return redirect()
            ->route('Club.index')
            ->with('success', 'Club ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // afficher des reclmations of club
        $reclamations = Club::find($id)->reclamations;
        return view('Club.showreclamations', ['reclamations' => $reclamations]);
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
    public function update(Request $request, int $id)
    {
        try {
            $Club = Club::findOrFail($id);
            $Club->name = $request->input('club_name');
            $Club->description = $request->input('description');
    
            if ($request->hasFile('image')) {
                $slug = Str::slug($request->name, '-');
                $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
                $request->image->move(public_path('images/club'), $newImageName);
                $Club->image = $newImageName;
            }
    
            if ($request->admin_id) {
                $Club->admin_id = $request->admin_id;
            }
    
            $Club->update();
    
            return redirect()->route('Club.index')->with('success', 'Club modifié avec succès!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('Club.index')->with('error', 'Ce club est lié à des réclamations et ne peut pas être modifié de cette manière.');
            }
       
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $club)
    {
        try {
            $Club = Club::findOrFail($club);
            $Club->delete();
            return redirect()
                ->route('Club.index')
                ->with('success', 'Club supprimé avec succès!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()
                    ->route('Club.index')
                    ->with('error', 'Ce club est lié à des réclamations et ne peut pas être supprimé.');
            }
        }
    }
}
