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
        $resultss = implode(", ", $result);

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
        $data = Election::find($id);
        $candidate= $data->candidates;
        return Inertia::render('Election/Detail',[
            'data' =>$data,
            'candidates'=>$candidate
        ]);
    }
}
