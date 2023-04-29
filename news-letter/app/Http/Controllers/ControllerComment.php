<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class ControllerComment extends Controller 
{

    /**
     * Método responsável por adicionar um novo comentário.
     */
    protected function newComment(Request $oRequest) 
    {
        if (!is_null($oRequest->content)) {
            $oComment = new Comments;
    
            $oComment->content = $oRequest->content;
            $oComment->post_id = $oRequest->id;
            $oComment->user_id = $oRequest->user()->id;
    
            $oComment->save();
        }
        return redirect('/posts/' . $oRequest->id);
    }

}