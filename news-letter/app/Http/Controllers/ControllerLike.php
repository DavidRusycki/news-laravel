<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;

class ControllerLike extends Controller 
{
    /**
     * Método responsável por inserir um novo 'Like' ou 'Dislike' ao Post.
     */
    protected function newLike(Request $oRequest) 
    {
        $oAvaliacao = new Likes;

        $oAvaliacao->post_id = $oRequest->id;
        $oAvaliacao->user_id = $oRequest->user()->id;
        $oAvaliacao->tipo = $oRequest->tipo;

        $oAvaliacao->save();
        
        return redirect('/');
    }   

}