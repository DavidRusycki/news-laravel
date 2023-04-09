<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;

class ControllerPost extends Controller
{
    /**
     * Retorna a tela para exibir os posts
     */
    public function getScreenPosts() 
    {
        return view('posts', ['posts' => Posts::all()]);
    }

    /**
     * Retorna a view de um post específico
     */
    public function getPostFromId(Int $id) 
    {
        return view('post', ['post' => Posts::where('id', $id)->first(), 'comments' => Comments::where('post_id', $id)->get()]);
    }

}
