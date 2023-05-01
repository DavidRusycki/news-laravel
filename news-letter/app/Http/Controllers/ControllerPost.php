<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\ExceptionPropria;
use App\Models\Likes;

class ControllerPost extends Controller
{
    /**
     * Retorna a tela para exibir os posts
     */
    public function getScreenPosts(Request $oRequest) 
    {
        $sSearch = request('search');
        if ($sSearch) {
            $aPosts = Posts::where([['tittle', 'ilike', '%' . $sSearch . '%']])->get();
        } else {
            $aPosts = Posts::all();
        }

        $oRequest->session()->flash('flash.banner', 'Yay it works!');

        return view('posts', ['posts' => $aPosts, 'user' => $oRequest->user()]);
    }

    /**
     * Retorna a view de um post específico
     */
    public function getPostFromId(Request $oRequest, Int $id) 
    {
        if (Posts::findOrFail($id)) {
            $iLikes = Likes::getLikesFromPost($id);
            $iDislikes = Likes::getDislikesFromPost($id);
            
            $aComments = Comments::getCommentsWithUser($id);
            
            return view('post', ['post' => Posts::where('id', $id)->first(), 'comments' => $aComments, 'user' => $oRequest->user(), 'likes' => $iLikes, 'dislikes' => $iDislikes]);
        }
        else {
            return $this->redirectHome();
        }
    }

    /**
     * Método responsável retornar a View de inclusão de Post
     */
    public function createPost(Request $oRequest) 
    {
        if ($oRequest->user()->isAdmin()) {
            return view('createPost');
        }
        else {
            return $this->redirectHome();
        }
    }

    /**
     * Método responsável por criar um novo Post
     */
    protected function newPost(Request $oRequest)
    {
        if ($oRequest->user()->isAdmin()) {
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
                return  redirect('/posts');
            }
            return  redirect('/post/new');
        }
        else {
            return $this->redirectHome();
        }
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
    private function trataDados($oRequest) 
    {
        return true;
    }

    /**
     * Método responsável por deletar o Post.
     */
    protected function deletePost(Request $oRequest, $id) 
    {
        if ($oRequest->user()->isAdmin()) {
            Posts::findOrFail($id)->delete();
        }

        return $this->redirectHome();
    }

    /**
     * Fornece a tela para editar um post
     */
    protected function editPost(Request $oRequest, $id) 
    {
        if ($oRequest->user()->isAdmin()) {
            $oPost = Posts::findOrFail($id);
            return view('editPost', ['post' => $oPost]);
        }
        else {
            return $this->redirectHome();
        }
    }

    /**
     * Método responsável por alterar o Post.
     */
    protected function updatePost(Request $oRequest) 
    {
        if ($oRequest->user()->isAdmin()) {
            $oPost = $oRequest->all();
            if ($oRequest->hasFile('image') && $oRequest->file('image')->isValid()) {
                $sImagePath = $this->addImagePath($oPost['image']);
                $oPost['image'] = $sImagePath;
            } 
            Posts::findOrFail($oRequest->id)->update($oPost);
        }
        return $this->redirectHome();
    }

    /**
     * Redireciona para a home.
     */
    public function redirectHome() 
    {
        return redirect('/posts');
    }

}
