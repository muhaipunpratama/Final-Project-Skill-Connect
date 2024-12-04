<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;  // Add this import
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Ambil data role dari sesi
        $role = session('user_role', null); // Nilai default adalah null jika tidak ada role di sesi

        // Kirimkan data role ke view
        return view('auth.register', compact('role'));
    }

    public function role(Request $request) {
        // Validasi input role
        $validated = $request->validate([
            'role' => 'required|in:job_seeker,employer',
        ]);
    
        // Simpan role ke session
        $role = $validated['role'];
        session(['user_role' => $role]);
    
        // Redirect ke halaman berikutnya
        return redirect()->route('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'in:job_seeker,employer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        \Log::info('Registration data:', $request->only(['username', 'email', 'role'])); // Add logging

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Change the redirect to use a direct route
        return redirect()->route('dashboard');
    }
}
