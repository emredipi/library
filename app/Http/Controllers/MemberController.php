<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('pages.member.index', [
            'users' => User::query()
                ->join('members', 'users.id', '=', 'members.id')
                ->when(
                    \request()->has('search'),
                    fn(Builder $q) => $q->where('name', 'like', '%'.\request()->search.'%')
                        ->orWhere('surname', 'like', '%'.\request()->search.'%')
                )
                ->paginate(10)
                ->withQueryString()
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
        \DB::beginTransaction();
        try {
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
            \DB::commit();
            return redirect()
                ->route('member.edit', $user->id)
                ->with('success', 'Üye Eklendi.');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()
                ->route('member.index')
                ->with('error', 'Üye eklenirken hata oluştu.');
        }
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

    public function books(Member $member)
    {
        return view('pages.member.books', [
            'member' => $member,
            'bookCopies' => $member->book_copies()
                ->whereNull('return_date')
                ->with('book')
                ->withPivot('given_date', 'id')
                ->get()
        ]);
    }
}
