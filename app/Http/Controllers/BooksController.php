<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Carbon\Carbon;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('book');
    }
    public function addABook(Request $request){
        $title = $request->input('title');
        $author = $request->input('author');
        $release = $request->input('release');
        $id = Auth::user()->id;


        $book = new Book;
        $book->title = $title;
        $book->author = $author;
        $book->release = $release;
        $book->id_user = $id;
        $book->save();

        return redirect('/books/list');

    }

    public function bookList(){
        $books = DB::table('books')->where('id_user', Auth::user()->id)->get();
        return view('bookList', ['books' => $books]);
    }

    public function deleteBook(Request $request, $id){
        $book = Book::find($id);

        $now = Carbon::now();
        $days = $now->diffInDays(Carbon::parse($book->created_at));

        if(!Auth::check() || Auth::user()->id != $book->id_user){
            abort(403);
        }

        if($days<=2){
            $book->delete();
        }

        return back();
    }
}
