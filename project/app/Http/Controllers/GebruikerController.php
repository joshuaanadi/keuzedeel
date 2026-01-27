<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class GebruikerController extends Controller
{
    public function registerForm()
    {
        return view('gebruiker.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:gebruikers,email',
            'studentnummer' => 'required|string|max:20|unique:gebruikers,studentnummer',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'klas' => ['required', Rule::in(['PALVSOD2A', 'PALVSOD2B', 'PALVSOD2C'])],
        ]);

        Gebruiker::create([
            'email' => $validated['email'],
            'studentnummer' => $validated['studentnummer'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'klas' => $validated['klas'],
        ]);

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('gebruiker.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $gebruiker = Gebruiker::where('email', $request->email)->first();

        if (!$gebruiker || !Hash::check($request->password, $gebruiker->password)) {
            return back()->withErrors([
                'login' => 'Email or password incorrect',
            ]);
        }

        session(['gebruiker_id' => $gebruiker->id]);

        return $gebruiker->role === 'admin'
            ? redirect('/dashboard')
            : redirect('/home');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    public function dashboard()
    {
        if (!session()->has('gebruiker_id')) {
            return redirect('/login');
        }
        $gebruiker = Gebruiker::find(session('gebruiker_id'));
        if ($gebruiker->role !== 'admin') {
            abort(403);
        }
        $gebruikers = Gebruiker::where('role', 'student')->get();
        return view('dashboard', compact('gebruikers'));
    }

    public function home()
    {
        if (!session()->has('gebruiker_id')) {
            return redirect('/login');
        }
        return view('home');
    }

    public function edit($id)
    {
        $gebruiker = Gebruiker::findOrFail($id);
        return view('gebruiker.edit', compact('gebruiker'));
    }

    public function update(Request $request, $id)
    {
        $gebruiker = Gebruiker::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('gebruikers')->ignore($gebruiker->id)],
            'studentnummer' => ['required', 'numeric', Rule::unique('gebruikers')->ignore($gebruiker->id)],
            'klas' => ['required', Rule::in(['PALVSOD2A', 'PALVSOD2B', 'PALVSOD2C'])], // <--- toegevoegd
        ]);

        $gebruiker->name = $validated['name'];
        $gebruiker->email = $validated['email'];
        $gebruiker->studentnummer = $validated['studentnummer'];
        $gebruiker->klas = $validated['klas'];

        $gebruiker->save();

        return redirect('/dashboard')->with('success', 'Gebruiker bijgewerkt!');
    }

    public function destroy($id)
    {
        Gebruiker::findOrFail($id)->delete();
        return back();
    }
}
