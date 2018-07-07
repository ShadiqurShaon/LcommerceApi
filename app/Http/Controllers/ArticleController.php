<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        
    }

    public function show()
    {
        
    }

    public function store(Request $request)
    {
        $articles = Article::create([
           'user_id' => $request->user()->id,
           'title' =>$request->input('title'),
            'subject' => $request->input('subject'),
            'description'=>$request->input('description'),
            'tags' =>$request->input('tags')
        ]);

        return 'article created successfully';
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}
