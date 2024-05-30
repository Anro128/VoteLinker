<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Election;
use App\Models\Candidate;
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
        if($election == null){
            return back();
        }
        return Inertia::render('Election/Edit',[
            'election' =>$election
        ]);
    }

    public function update(Request $request, $id){
        // return dd($request);
        $election = Election::find($id);
        if($election == null){
            return back();
        }

        $election->update([
            'Title' => $request->title,
            'Description' => $request->description,
            'Scope' => $request->scope,
            'IsOpen' =>$request->isopen,
            'IsPublicResult' => $request-> ispublic
        ]);
        return Redirect::route('election.detail', ['id' => $id]);
    }

    public function delete($id){
        $election = Election::find($id);
        if ($election) {
            $election->delete();
            return response()->json(['message' => 'Election deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Election not found'], 404);
        }
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
        // return dd($election);
        if($election == null){
            return back();
        }

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
            'candidates'=>$election->candidates,
            'acctovote' => $acctovote
        ]);
    }


    public function vote(Request $request): RedirectResponse{
        $nim = auth::user()->NIM;
        $election = Election::find($request->idElection);
        if($election == null){
            return back();
        }
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

    public function result($id){
        $election = Election::find($id);
        if($election == null){
            return back();
        }

        $candidates = $election->candidates;
        $pemilih=0;

        $nim = auth::user()->NIM;
        $isAccess=false;
        $scop= $election->Scope;
        $arrScope = explode(',', $scop);
        for ($i = 0; $i < count($arrScope); $i++) {
            if(Str::contains($nim, $arrScope[$i])){
                $isAccess=true;
            }
        }

        // return dd(!$election->IsPublicResult,!$isAccess, auth::user()->role != 'admin',  (!$election->IsPublicResult || !$isAccess) && auth::user()->role != 'admin');

        if((!$election->IsPublicResult || !$isAccess) && auth::user()->role != 'admin'){
            return back();
        }

        $res = $election->Result;
        $arrRes = explode(',', $res);
        $tmp =$arrRes;
        $arrRes =[];

        foreach($tmp as $t){
            $arrRes[]=(int)$t;
        }
        
        foreach ($candidates as $candidate) {
            $candidate['result']=$arrRes[$candidate->SerialNumber];
            $pemilih += $arrRes[$candidate->SerialNumber];
        }

        $newCandidate = new Candidate();
        $newCandidate->Chairman = "Tidak Memilih";
        $newCandidate->result = $election->TotalVoter - $pemilih;

        array_shift($arrRes);

        $sz= count($arrRes);
        $nourut = [];
        for ($i = 1; $i <= $sz; $i++) {
            $nourut[] = $i;
        }
        $nourut[] = "Tidak Memilih";

        $arrRes[]=$election->TotalVoter - $pemilih;

        $candidates->add($newCandidate);
        // return dd($arrRes, $nourut);

        // bikin warna random
        function generateRandomColor() {
            $red = mt_rand(0, 255);
            $green = mt_rand(0, 255);
            $blue = mt_rand(0, 255);
        
            $color = sprintf("#%02x%02x%02x", $red, $green, $blue);
        
            return $color;
        }

        $colors = [];
        for ($i = 0; $i <= $sz; $i++) {
            $colors[] = generateRandomColor();
        }

        // return dd($colors);

        return Inertia::render('Election/Results',[
            'election' =>$election,
            'candidates'=>$candidates,
            'arrRes' =>$arrRes,
            'noUrut'=>$nourut,
            'color' => $colors
        ]);
    }
}
