<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function getSearchTags () {
        $tags = Tag::all();
        return view('sections.search')->with('tags', $tags);
    }

    public function accessCategoryOfBooks ($name) {
        $tags = Tag::all();
        $tag = Tag::where('name', $name)->first();
        $books = $tag->books;
        return view('search.results')->with(['books' => $books, 'tags' => $tags, 'name' => $name]);
    }
}
