<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Election;
use App\Models\Candidates;
use Inertia\Inertia;
use Inertia\Response;

class ElectionController extends Controller
{
    public function index()
    {
        $nim = auth::user()->NIM;
        $elections = Election::All();

        $filtered = $elections->filter(function ($item) use ($nim) {
            $ret=false;
            $scop= $item->Scope;
            $arrScope = explode(',', $scop);
            for ($i = 0; $i < count($arrScope); $i++) {
                if(Str::contains($nim, $arrScope[$i])){
                    $ret=true;
                }
            }
            return $ret;
        });

        $filtered = $filtered->values();

        if (!$filtered instanceof \Illuminate\Support\Collection) {
            $filtered = collect($filtered); // Mengubah menjadi Collection jika tidak
        }

        // return dd($elections, $filtered);
        return Inertia::render('Election/Index',[
            'elections' =>$filtered
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
        $nim = auth::user()->NIM;
        $election = Election::find($id);

        // cek udah vote apa belum
        $udh= Str::contains($election->ListFinishVoting,$nim);
       
        //ngecek akses
        $ret=false;
        $scop= $election->Scope;
        $arrScope = explode(',', $scop);
        for ($i = 0; $i < count($arrScope); $i++) {
            if(Str::contains($nim, $arrScope[$i])){
                $ret=true;
            }
        }

        if(!$ret){
            return back();
        }

        $candidate= $election->candidates;
        return Inertia::render('Election/Detail',[
            'election' =>$election,
            'candidates'=>$candidate,
            'finish' => $udh
        ]);
    }

    public function vote(Request $request): RedirectResponse{
        $nim = auth::user()->NIM;
        $election = Election::find($request->idElection);

        // cek udah vote apa belum
        $udh= Str::contains($election->ListFinishVoting,$nim);

        if($udh) return back();

        
        $res = $election->Result;

        $arrRes = explode(',', $res);
        $arrRes[$request->idCandidate - 1]+=1;

        $rest = implode(",", $arrRes);


        //add to list finish
        $finish = $election->ListFinishVoting;
        $finish = $finish . "," . auth::user()->NIM;


        $election->update([
            'Result'=> $rest,
            'ListFinishVoting' => $finish
        ]);

        return back();
    }
}
