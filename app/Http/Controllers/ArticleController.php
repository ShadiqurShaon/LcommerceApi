<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $artilesOfUser = User::where('id','=',$request->user()->id)
            ->with('profile','article')->get();

        return $artilesOfUser;
    }

    public function show(Request $request ,$id)
    {
        $article = Article::where('id','=',$id)
            ->where('user_id','=',$request->user()->id)
            ->get();

        return $article;
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

    public function update(Request $request,$id)
    {
        $article = Article::where('id','=',$id)
            ->where('user_id','=',$request->user()->id)
            ->first();

        $article->title = $request->input('title');
            $article->subject = $request->input('subject');
            $article->description=$request->input('description');
            $article->tags =$request->input('tags');

            $article->save();

            return "update successfully";
        
    }

    public function delete()
    {
        
    }
}
