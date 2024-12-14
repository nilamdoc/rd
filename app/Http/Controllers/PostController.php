<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index()
    {
        // Fetch all posts from the database
        $posts = DB::table('posts')->get();
        echo '<pre>';
        print_r($posts);
        exit;
        // Return the view with posts data
        return view('posts.index', compact('posts'));
    }
}
