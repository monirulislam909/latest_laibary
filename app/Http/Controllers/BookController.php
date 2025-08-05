<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = DB::table("books")->get();
        return view('book.index', [
            "data" => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "isbn" => "required|integer",
            "copies" => "required|integer",
            "available_copy" => "required|integer",
            "cover" => "nullable|image",
        ]);
        $file_name = null;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file_name = time() . "_" . $file->getClientOriginalName();

            $file->move(public_path('bookPhoto'), $file_name);
        }

        DB::table('books')->insert([

            "title" => $request->title,
            "author" => $request->author,
            "isbn" => $request->isbn,
            "copies" => $request->copies,
            "available_copy" => $request->available_copy,
            "cover" => $file_name,
            "created_at" => now(),

        ]);
        return redirect()->back()->with('success', "Book created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', [
            "data" => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'data' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "isbn" => "required|integer",
            "copies" => "required|integer",
            "available_copy" => "required|integer",
            "cover" => "nullable|image",
        ]);
        $data = [

            "title" => $request->title,
            "author" => $request->author,
            "isbn" => $request->isbn,
            "copies" => $request->copies,
            "available_copy" => $request->available_copy,



        ];

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file_name = time() . "_" . $file->getClientOriginalName();
            if ($book->cover && file_exists(public_path('bookPhoto/' . $book->cover))) {
                unlink(public_path('bookPhoto/' . $book->cover));
            }
            $file->move(public_path('bookPhoto'), $file_name);

            $data['cover'] = $file_name;
        }

        $book->update($data);
        return redirect()->back()->with('success', "Book updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover && file_exists(public_path('bookPhoto/' . $book->cover))) {
            unlink(public_path('bookPhoto/' . $book->cover));
        }
        $book->delete();
        return redirect()->back()->with('success', "Book delete successfully");
    }
}
