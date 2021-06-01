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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
