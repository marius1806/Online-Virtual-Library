<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function accessBook ($name, $title) {
        $book = Book::where('title', $title)->first();
        $comments = $book->comments;
        return view('sections.book', ['name' => $name ,'comments' => $comments, 'title' => $title, 'book' => $book]);
    }

    public function postComment ($name, $title, Request $request) {
        $this->validate($request, [
            'comment-text'=>'required|min:5'
        ]);
        $user = Auth::user();
        $book = Book::where('title', $title)->first();
        $comment = new Comment([
            'comment' => $request->input('comment-text'),
            'user_id' => $user->id
        ]);
        $book->comments()->save($comment);
        return redirect()->back();
    }

    public function deleteComment ($name, $title, $id) {
        Comment::where('id', $id)->first()->delete();
        return redirect()->back();
    }

    public function borrowBook ($name, $title) {
        $user = Auth::user();
        $book = Book::where('title', $title)->first();
        if (!empty($book->user) or $user->books->count() > 2) {
            return redirect()->back();
        }
        $book->user_id = $user->id;
        $book->save();
        return redirect()->back();
    }

    public function myBooks () {
        $user = Auth::user();
        return view('sections.borrowed')->with('books', $user->books);
    }

    public function readBook ($title) {
        $book = Book::where('title', $title)->first();
        if ($book->user_id != Auth::user()->id) {
            return redirect()->back();
        }
        return view('sections.read')->with('book', $book);
    }

    public function returnBook ($title) {
        $book = Auth::user()->books->where('title', $title)->first();
        $book->user_id = NULL;
        $book->save();
        return redirect()->to('borrowedBooks');
    }
}