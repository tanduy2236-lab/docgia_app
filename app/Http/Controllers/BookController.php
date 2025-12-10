<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Danh sách
    public function index()
    {
        $books = Book::orderByDesc('id')->get();
        return view('books.index', compact('books'));
    }

    // Thêm sách
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer|min:0',
        ]);

        Book::create($request->only(['title','author','year']));

        return redirect()->back()->with('success', 'Thêm sách thành công!');
    }

    // Cập nhật sách
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->only(['title','author','year']));

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    // Xóa sách
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sách!');
    }
}
