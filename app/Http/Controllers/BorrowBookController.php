<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Member;

use App\Models\User;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('pages.book.borrow.edit');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        /* @var Member $member */
        $member = Member::query()->findOrFail($request->member);
        $bookCopy = BookCopy::query()->findOrFail($request->book_copy);
        $member->book_copies()->attach($bookCopy, ['given_date' => now()]);
        return redirect()
            ->route('member.books', $member->id)
            ->with('success', 'Kitap üyeye teslim edildi.');
    }

    public function edit($id)
    {
        $borrow = BookCopy::query()
            ->join(
                'book_copy_member',
                'book_copies.id', '=',
                'book_copy_member.book_copy_id'
            )
            ->where('book_copy_member.id', $id)
            ->firstOrFail();
        return view('pages.book.borrow.edit', [
            'borrow' => $borrow,
            'member' => User::query()->findOrFail($borrow->member_id),
            'book' => Book::query()->findOrFail($borrow->book_id)
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        \DB::table('book_copy_member')
            ->whereId($id)
            ->update($request->only('return_date', 'given_date'));
        return back()->with('success', 'Emanet kaydı güncellendi.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $row = \DB::table('book_copy_member')->find($id);
        \DB::table('book_copy_member')->whereId($id)->delete();
        return redirect()
            ->route('member.books', $row->member_id)
            ->with('success', 'Kitap emanet kaydı silindi.');
    }
}
