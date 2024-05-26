<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Election;
use App\Models\Candidate;
use Inertia\Inertia;
use Inertia\Response;

class CandidateController extends Controller
{
    public function add($id){
        $election = Election::find($id);
        return Inertia::render('Election/AddCandidate',[
            'election' =>$election
        ]);
    }

    public function delete($id){
        $candidate = Candidate::find($id);
        $election = $candidate->election;

        //reset result
        $res = $election->Result;
        $arrRes = explode(',', $res);
        foreach ($arrRes as $key => $value) {
            $arrRes[$key] = 0;
        }
        $rest = implode(",", $arrRes);
        $election->update([
            'Result'=> $rest
        ]);

        if ($candidate) {
            $candidate->delete();
            return response()->json(['message' => 'Election deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Election not found'], 404);
        }
    }

    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            'election_id' => 'required|integer',
            'SerialNumber' => 'required|integer',
            'Chairman' => 'required|string',
            'DeputyChairman' => 'required|string',
            'Vision' => 'required|string',
            'Mision' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',  // Validasi foto
        ]);

        // Menangani unggahan foto (jika ada)
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $request->Chairman.'-'.$request->DeputyChairman . '_' . time().'.'. $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/candidates', $fileName, 'public');  // Simpan di penyimpanan publik
            
            $validated['Photo'] = $filePath;  // Simpan jalur foto di database
        }

        Candidate::create($validated);

        return Redirect::route('election.detail', ['id' => $request->election_id]);
    }


    public function edit($id){
        $candidate = Candidate::find($id);
        $elections = Election::All();

        return Inertia::render('Election/EditCandidate',[
            'candidate' => $candidate,
            'elections' => $elections
        ]);
    }

    public function update(Request $request, $id){
        // return dd($request);
        $candidate = Candidate::find($id);

        $validated = $request->validate([
            'election_id' => 'required|integer',
            'SerialNumber' => 'required|integer',
            'Chairman' => 'required|string',
            'DeputyChairman' => 'required|string',
            'Vision' => 'required|string',
            'Mision' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Validasi foto
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');            
            $fileName = $request->Chairman.'-'.$request->DeputyChairman . '_' . time().'.'. $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/candidates', $fileName, 'public');  // Simpan di penyimpanan publik
            
            $validated['Photo'] = $filePath;  // Simpan jalur foto di database
        }else{
            $validated['Photo'] = $candidate->Photo;  // Simpan jalur foto di database
        }

        $candidate->update($validated);

        return Redirect::route('election.detail', ['id' => $candidate->election->id]);
    }

}
