<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;
use Illuminate\Support\Facades\Hash;

class GebruikerController extends Controller
{

    public function register(Request $request)
    {
        $gebruiker = new Gebruiker;
        $gebruiker->email = $request->email;
        $gebruiker->studentnummer = $request->studentnummer;
        $gebruiker->name = $request->name;
        $gebruiker->password = Hash::make($request->password);
        $gebruiker->role = 'student';
        $gebruiker->save();

        return redirect('/welcome');
    }

    public function login(Request $request)
    {
        $gebruiker = Gebruiker::where('email', $request->email)->first();

        if ($gebruiker && Hash::check($request->password, $gebruiker->password)) {
            session(['gebruiker_id' => $gebruiker->id]);
            if ($gebruiker->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/welcome');
            }
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        $gebruiker = Gebruiker::find($id);
        $gebruiker->email = $request->email;
        $gebruiker->name = $request->name;

        if ($request->password) {
            $gebruiker->password = Hash::make($request->password);
        }

        $gebruiker->save();
        return back();
    }


    public function destroy($id)
    {
        $gebruiker = Gebruiker::find($id);
        $gebruiker->delete();
        return back();
    }

    public function dashboard()
    {
        $gebruikers = Gebruiker::where('role', 'student')->get();
        return view('dashboard', ['gebruikers' => $gebruikers]);
    }

    public function welcome()
    {
        return view('welcome');
    }
}
