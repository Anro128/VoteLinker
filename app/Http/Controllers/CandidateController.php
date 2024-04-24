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
    public function add(){
        $elections = Election::All();
        return Inertia::render('Election/AddCandidate',[
            'elections' =>$elections
        ]);
    }
    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            'election_id' => 'required|integer',
            'SerialNumber' => 'required|integer',
            'Chairman' => 'required|string',
            'DeputyChairman' => 'required|string',
            'Vision' => 'required|string',
            'Mision' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi foto
        ]);

        // Menangani unggahan foto (jika ada)
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/candidates', $fileName, 'public');  // Simpan di penyimpanan publik
            
            $validated['Photo'] = $filePath;  // Simpan jalur foto di database
        }

        Candidate::create($validated);

        return Redirect::route('election.detail', ['id' => $request->election_id]);
    }

}
