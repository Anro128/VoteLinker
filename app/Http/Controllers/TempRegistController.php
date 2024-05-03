<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TempRegist;
use App\Models\Election;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class TempRegistController extends Controller
{

    public function index(){
        $regist = TempRegist::all();
        return Inertia::render('Profile/Registran',[
            'regists' =>$regist
        ]);
    }


    public function del($id){
        $data =  TempRegist::find($id);
        if (!$data) {
            return back()->witherror('not found');
        }
        
        $data->delete(); 
        
        return back();
    }


    public function acc($id){
        $data =  TempRegist::find($id);

        $user = User::create([
            'name' => $data->name,
            'NIM' => $data->NIM,
            'fakultas' => $data->fakultas,
            'departemen' => $data->departemen,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        $this->del($id);

        // tambah jumlah voter dalam election
        $nim = $data -> NIM;
        $elections= Election::all();
        foreach ($elections as $election) {
            $ret=false;
            $scop= $election->Scope;
            $arrScope = explode(',', $scop);
            for ($i = 0; $i < count($arrScope); $i++) {
                if(Str::contains($nim, $arrScope[$i])){
                    $ret=true;
                }
            }
            
            if($ret){
                $election->update([
                    'TotalVoter'=> $election->TotalVoter + 1,
                ]);
            }
        }

        return back();
    }
    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'NIM' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'fakultas' => ['required', 'string', 'max:255'],
            'departemen' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'KTM' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // return dd($request);

        if ($request->hasFile('KTM')) {
            $file = $request->file('KTM');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/regist', $fileName, 'public');  // Simpan di penyimpanan publik
            
            $validated['KTM'] = $filePath;  // Simpan jalur foto di database
        }

        TempRegist::Create($validated);

        return redirect()->intended('/');
    }
}
