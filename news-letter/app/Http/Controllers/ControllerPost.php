<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\ExceptionPropria;

class ControllerPost extends Controller
{
    /**
     * Retorna a tela para exibir os posts
     */
    public function getScreenPosts() 
    {
        $sSearch = request('search');
        if ($sSearch) {
            $aPosts = Posts::where([['tittle', 'ilike', '%' . $sSearch . '%']])->get();
        } else {
            $aPosts = Posts::all();
        }
        
        return view('posts', ['posts' => $aPosts]);
    }

    /**
     * Retorna a view de um post específico
     */
    public function getPostFromId(Int $id) 
    {
        return view('post', ['post' => Posts::where('id', $id)->first(), 'comments' => Comments::where('post_id', $id)->get()]);
    }

    /**
     * Método responsável retornar a View de inclusão de Post
     */
    public function createPost() 
    {
        return view('createPost');
    }

    /**
     * Método responsável por criar um novo Post
     */
    protected function newPost(Request $oRequest)
    {
        if ($this->validaDados($oRequest)) {
            $this->trataDados($oRequest);
            $oPost = new Posts;
            $oPost->tittle = $oRequest->tittle;
            $oPost->content = $oRequest->content;
    
            if (!$oRequest->hasFile('image')) {
                $oPost->image = 'padrao';
            } else 
            if ($oRequest->hasFile('image') && $oRequest->file('image')->isValid()) {
                $sImagePath = $this->addImagePath($oRequest->image);
                $oPost->image = $sImagePath;
            }
    
            $oPost->save();
            return  redirect('/');
        }
        return  redirect('/post/new');
    }

    /**
     * Método responsável por adicionar a imagem do Post.
     * @return string 
     */
    private function addImagePath($oImage, $bReturnPathImage = true) 
    {
        $oExtensionImage = $oImage->extension();
        $sImageName = md5($oImage->getClientOriginalName() . strtotime("NOW()") . "." . $oExtensionImage);
        $oImage->move(public_path('img/post'), $sImageName);
        
        if ($bReturnPathImage) {
            return $sImageName;
        }
    }

    /**
     * Método responsável por garantir que os campos estão preenchidos.
     */
    private function validaDados($oRequest) 
    {
        switch($oRequest) {
            case is_null($oRequest->tittle) :
                return false;
            case is_null($oRequest->content) :
                return false;
        }
        return true;
    }


    /**
     * Trata os dados para a inclusão ou alteração
     */
    private function trataDados($oRequest) {
        return true;
    }

    /**
     * Método responsável por deletar o Post.
     */
    protected function deletePost($id) {
        Posts::findOrFail($id)->delete();

        return redirect('/');
    }

}
