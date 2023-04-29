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
        $aRegistros = Likes::where('post_id', $oRequest->id)->where('user_id', $oRequest->user()->id)->limit(1)->get();
        $i = count($aRegistros);
        $bInsere = true;

        if ($i > 0) {
            $aRegistros[0]->delete();
            $bInsere = $aRegistros[0]->tipo != $oRequest->tipo;
        }

        if ($bInsere) {
            $oAvaliacao = new Likes;

            $oAvaliacao->post_id = $oRequest->id;
            $oAvaliacao->user_id = $oRequest->user()->id;
            $oAvaliacao->tipo = $oRequest->tipo;

            $oAvaliacao->save();
        }

        return redirect('/posts/'.$oRequest->id);
    }   

}