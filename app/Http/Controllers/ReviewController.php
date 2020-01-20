<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class ReviewController extends Controller
{
    public function store(Request $request)
    {

        $user= Auth::user()->id;
        $article=new Article();
        $article->user_id=$user;
        $article->comment=$request->comment;
        $article->movieName=$request->movieName;
        $article->wishAdded=$request->wishAdded;
        $article->rating=$request->rating;
        $article->save();
        return view ('user.movieDetail');

    }
}

