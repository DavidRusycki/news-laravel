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
        return view('posts', ['quantidade' => Posts::count()]);
    }
}
