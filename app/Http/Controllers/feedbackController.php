<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Feedback;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware("admin");
    }
    public function index()
    {

        $clubs=Club::all()->where('admin_id',Auth::user()->id);
        // foreach($clubs as $club){
        //     foreach($club->reclamations as $reclamation){
        //         echo $reclamation;
        //     }
        // }
        return view('/feedback.index',["clubs"=>$clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedback.addfeedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        validator($request->all());
        $feedback=new Feedback();
        $feedback->response=$request->input('response');
        $feedback->admin_id=Auth::user()->id;
        $feedback->reclamation_id=$request->input('reclamation_id');
        $reclamation=Reclamation::findorfail($request->input('reclamation_id'));
        $reclamation->etat=1;
        $reclamation->update();
        $feedback->save();
        return redirect()->route('feedback.index')->with('success', 'Feedback ajoutée avec succès!');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $NumReclamation)
    {
        $reclamation = Reclamation::findOrfail($NumReclamation);
        $feedbacks= $reclamation->feedbacks;
        // dd($feedbacks);
        return view ('/feedback/Showfeedbacks',['reclamation'=>$NumReclamation,'feedbacks'=>$feedbacks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $feedback)
    {
        return view('feedback.updatefeedback',['feedback'=>Feedback::findorfail($feedback)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $feedback)
    {
        validator($request->all());
        $updatefeedback=feedback::findorfail($feedback);
        // echo $request->input('response');
        $updatefeedback->response=$request->input('response');
        $updatefeedback->update();     
        $reclamation = Reclamation::findOrfail(session('reclamation'));
        $feedbacks= $reclamation->feedbacks;   
        return view ('/feedback/Showfeedbacks',['reclamation'=>session('reclamation'),'feedbacks'=>$feedbacks]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $feedback)
    {
        $feedback=feedback::findorfail($feedback);
        $feedback->delete();
        $reclamation = Reclamation::findOrfail(session('reclamation'));
        $feedbacks= $reclamation->feedbacks;   
        return view ('/feedback/Showfeedbacks',['reclamation'=>session('reclamation'),'feedbacks'=>$feedbacks]);
    }
}
