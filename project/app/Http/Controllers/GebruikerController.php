<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class GebruikerController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:gebruikers,email',
            'studentnummer' => 'required|string|max:20|unique:gebruikers,studentnummer',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $gebruiker = new Gebruiker;
        $gebruiker->email = $validated['email'];
        $gebruiker->studentnummer = $validated['studentnummer'];
        $gebruiker->name = $validated['name'];
        $gebruiker->password = Hash::make($validated['password']);
        $gebruiker->role = 'student';
        $gebruiker->save();

        return redirect('/welcome');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $gebruiker = Gebruiker::where('email', $request->email)->first();

        if ($gebruiker && Hash::check($request->password, $gebruiker->password)) {
            session(['gebruiker_id' => $gebruiker->id]);

            return $gebruiker->role === 'admin'
                ? redirect('/dashboard')
                : redirect('/welcome');
        }

        return back()->withErrors([
            'email' => 'Login failed'
        ]);
    }

    // Update Student
    public function update(Request $request, $id)
    {
        $gebruiker = Gebruiker::findOrFail($id);

        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('gebruikers', 'email')->ignore($gebruiker->id),
            ],
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $gebruiker->email = $validated['email'];
        $gebruiker->name = $validated['name'];

        if (!empty($validated['password'])) {
            $gebruiker->password = Hash::make($validated['password']);
        }

        $gebruiker->save();
        return back();
    }

    // Delete Student
    public function destroy($id)
    {
        Gebruiker::findOrFail($id)->delete();
        return back();
    }

    // Admin Dashboard
    public function dashboard()
    {
        $gebruikers = Gebruiker::where('role', 'student')->get();
        return view('dashboard', ['gebruikers' => $gebruikers]);
    }

    // student Welcome
    public function welcome()
    {
        return view('welcome');
    }
}

