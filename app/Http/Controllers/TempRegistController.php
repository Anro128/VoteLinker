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

    function enc($text, $shift) {
        $result = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_upper($char)) {
                $result .= chr((ord($char) + $shift - 65) % 26 + 65);
            }
            else if (ctype_lower($char)) {
                $result .= chr((ord($char) + $shift - 97) % 26 + 97);
            }
            else {
                $result .= $char;
            }
        }
    
        return $result;
    }
    
    function dec($text, $shift) {
        return $this->enc($text, -$shift);
    }

    public function acc($id){
        $data =  TempRegist::find($id);
        $data['password'] = $this->dec($data['password'],7);

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
        $validated['password'] = $this->enc($validated['password'],7);

        TempRegist::Create($validated);

        return redirect()->intended('/');
    }
}
