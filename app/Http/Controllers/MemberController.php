<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('pages.member.index', [
            'users' => User::query()
                ->join('members', 'users.id', '=', 'members.id')
                ->paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.member.edit');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'tc' => 'required|unique:members|numeric|digits:11',
            'birth_date' => 'required|date'
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => \Hash::make(\Str::random())
        ]);

        $user->member()->create([
            'id' => $user->id,
            'birth_date' => $request->birth_date,
            'tc' => $request->tc,
        ]);
        return redirect()
            ->route('member.edit', $user->id)
            ->with('success', 'Üye Eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    public function edit($id)
    {
        return view('pages.member.edit', [
            'member' => Member::query()
                ->join('users', 'users.id', '=', 'members.id')
                ->findOrFail($id)
        ]);
    }

    public function update(Request $request, Member $member): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);
        $member->update($request->only('tc', 'birth_date') +
            [
                'banned_at' => $request->is_banned
                    ? today()
                    : null
            ]
        );
        $member->user()->update($request->only('name', 'surname', 'email'));
        return back()->with('success', 'Üye güncellendi.');
    }

    public function destroy(Member $member): \Illuminate\Http\RedirectResponse
    {
        $member->user()->delete();
        return redirect()
            ->route('member.index')
            ->with('success', 'Üye silindi.');
    }
}
