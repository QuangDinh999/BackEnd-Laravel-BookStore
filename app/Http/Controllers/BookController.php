<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\publisher;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::with('category', 'publisher')->get();
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function BookByCategory(Request $request)
    {
        $data = book::where('categories_id', $request->id)->get();
        return response()->json($data);
    }

    public function BookByPublisher(Request $request)
    {
        $data = book::where('publisher_id', $request->id)->get();
        return response()->json($data);
    }

    public function BookDetail(Request $request)
    {
        $data = Book::where('id', $request->id)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookRequest $request)
    {
//          return $request->all();
        $data = book::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return  $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookRequest $request, book $book)
    {
        $book->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $book
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return response()->json([
            'success' => true,
            'data' => $book
        ], 200);
    }
}
