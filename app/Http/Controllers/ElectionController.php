<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Election;
use App\Models\Candidates;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ElectionController extends Controller
{
    public function index()
    {
        $nim = auth::user()->NIM;
        $elections = Election::All();

        if(auth::user()->role == 'admin'){
            return Inertia::render('Election/Index',[
                'elections' =>$elections
            ]);
        }

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

    public function edit($id){
        $election = Election::find($id);
        return Inertia::render('Election/Edit',[
            'election' =>$election
        ]);
    }

    public function update(Request $request, $id){
        // return dd($request);
        $election = Election::find($id);

        $election->update([
            'Title' => $request->title,
            'Description' => $request->description,
            'Scope' => $request->scope,
            'IsOpen' =>$request->isopen,
            'IsPublicResult' => $request-> ispublic
        ]);
        return Redirect::route('election.detail', ['id' => $id]);
    }

    public function store(Request $request): RedirectResponse{
        $result = array_fill(0,$request->jumcalon + 1, 0);
        $resultss = implode(",", $result);

        $allUser= User::All();
        $TotVoter = 0 ;
        foreach ($allUser as $user){
            $nim = $user->NIM;
            $ret= false;
            $arrScope = explode(',', $request->scope);
            for ($i = 0; $i < count($arrScope); $i++) {
                if(Str::contains($nim, $arrScope[$i])){
                    $ret=true;
                }
            }

            if($ret) $TotVoter++;
        }

        Election::Create([
            'Title' => $request->title,
            'Description' => $request -> description,
            'Result'=> $resultss,
            'Scope'=> $request->scope,
            'ListFinishVoting'=>"X",
            'TotalVoter'=>$TotVoter
        ]);

        return Redirect::route('election.index');
    }

    public function detail($id){
        $nim = auth::user()->NIM;
        $election = Election::find($id);
        $candidate= $election->candidates;

        // cek udah vote apa belum
        $acctovote= Str::contains($election->ListFinishVoting,$nim);
        $acctovote = !$acctovote;


        //cek masih buka atau tutup
        $acctovote &= $election->IsOpen;
       
        //ngecek akses
        $ret=false;
        $scop= $election->Scope;
        $arrScope = explode(',', $scop);
        for ($i = 0; $i < count($arrScope); $i++) {
            if(Str::contains($nim, $arrScope[$i])){
                $ret=true;
            }
        }

        if(!$ret && auth::user()->role != 'admin'){
            return back();
        }
        
        // return dd($acctovote);

        return Inertia::render('Election/Detail',[
            'election' =>$election,
            'candidates'=>$candidate,
            'acctovote' => $acctovote
        ]);
    }


    public function vote(Request $request): RedirectResponse{
        $nim = auth::user()->NIM;
        $election = Election::find($request->idElection);

        // cek udah vote apa belum
        $udh= Str::contains($election->ListFinishVoting,$nim);

        if($udh ||  !$election->IsOpen) return back();


        $res = $election->Result;

        $arrRes = explode(',', $res);
        $arrRes[$request->idCandidate] +=1;

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
