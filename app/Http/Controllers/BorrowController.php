<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $data = DB::table("borrows")
            ->join('students', 'borrows.student_id', '=', 'students.id')
            ->join('books', 'borrows.book_id', '=', 'books.id')
            ->select('borrows.*', 'students.name', 'students.photo', 'books.title', 'books.cover')
            ->orderBy("return_date", "asc")

            ->get();
        return view('borrow.index', [
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('borrows')->insert([
            "book_id"     => $request->book,
            "student_id"  => $request->student_id,
            "return_date" => $request->issue_date,
            "created_at" => now(),


        ]);
        $data = DB::table('books')->where('id', $request->book)->first();


        DB::table('books')
            ->where('id', $request->book)
            ->update([
                "available_copy" => $data->available_copy - 1
            ]);
        return redirect()->back()->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
    public function search()
    {
        $data = DB::table('students')->get();
        return view('borrow.student_search', [
            'data' => $data
        ]);
    }
    public function search_student(Request $request)
    {
        $data = DB::table('students')
            ->where("student_id", $request->id)
            ->get();
        return view('borrow.student_search', [
            'data' => $data
        ]);
    }


    public function assignbook($id)
    {
        $data = DB::table('students')
            ->where("id", $id)
            ->first();
        $bdata = DB::table('books')->get();

        return view('borrow.bookAssign', [
            "data" => $data,
            "bdata" => $bdata
        ]);
    }
    public function borrowReturn($id, $book_id)
    {

        DB::table('borrows')
            ->where('id', $id)
            ->update([
                "status" => "returned"
            ]);
        $data = DB::table('books')->where('id', $book_id)->first();


        DB::table('books')
            ->where('id', $book_id)
            ->update([
                "available_copy" => $data->available_copy + 1
            ]);
        return back()->with('success', 'Student update successfully');
    }
    public function borrowOverdue($id)
    {

        DB::table('borrows')
            ->where('id', $id)
            ->update([
                "status" => "overdue"
            ]);
        return redirect()->back()->with('success', 'Student update successfully');
    }
}
