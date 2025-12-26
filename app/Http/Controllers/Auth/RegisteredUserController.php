<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
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
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Get the 'donor' role ID
        $donorRole = Role::where('name', 'donor')->firstOrFail();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $donorRole->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display the registration view (register_2).
     */
    public function create2(): View
    {
        return view('auth.register_2');
    }

    /**
     * Handle an incoming registration request (register_2).
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store2(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'address' => ['required', 'string', 'max:500'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['required', 'accepted'],
        ]);

        // Get the 'donor' role ID
        $donorRole = Role::where('name', 'donor')->firstOrFail();

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => $donorRole->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/')->with('success', 'Pendaftaran berhasil! Selamat bergabung dengan AORTA Malang.');
    }
}
