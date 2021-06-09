<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Member;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create(): \Illuminate\View\View
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {

        \DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $member = Member::create([
                'id' => $user->id,
                'birth_date' => $request->birth_date,
                'tc' => $request->tc,
            ]);
            event(new Registered($user));
            Auth::login($user);
        });

        return redirect(RouteServiceProvider::HOME);
    }
}
