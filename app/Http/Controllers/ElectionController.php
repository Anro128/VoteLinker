<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Election;
use App\Models\Candidates;
use Inertia\Inertia;
use Inertia\Response;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::All();
        return Inertia::render('Election/Index',[
            'elections' =>$elections
        ]);
    }

    public function add(){
        return Inertia::render('Election/Add');
    }

    public function store(Request $request): RedirectResponse{
        $result = array_fill(0,$request->jumcalon, 0);
        $resultss = implode(",", $result);

        Election::Create([
            'Title' => $request->title,
            'Description' => $request -> description,
            'Result'=> $resultss,
            'Scope'=> $request->scope,
            'ListFinishVoting'=>"X",
        ]);

        return Redirect::route('election.index');
    }

    public function detail($id){
        $election = Election::find($id);
        $candidate= $election->candidates;
        return Inertia::render('Election/Detail',[
            'election' =>$election,
            'candidates'=>$candidate
        ]);
    }

    public function vote(Request $request): RedirectResponse{
        $election = Election::find($request->idElection);
        $res = $election->Result;

        $arrRes = explode(',', $res);
        $arrRes[$request->idCandidate -1]+=1;

        $rest = implode(",", $arrRes);


        //add to list finish
        $finish = $election->ListFinishVoting;
        $finish = $finish . "," . $request->nim;


        $election->update([
            'Result'=> $rest,
            'ListFinishVoting' => $finish
        ]);

        return back();
    }
}
