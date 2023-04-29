<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    /**
     * Chave primária da tabela.
     * @var BigInt
     */
    protected $primaryKey = 'id';

    /**
     * Carrega os usuários na lista de comentários.
     */
    public static function getCommentsWithUser($id) {
        $aList = Comments::where('post_id', $id)->get();
        foreach($aList as $comment) {
            $comment->user = User::findOrFail($comment->user_id);
        }

        return $aList;
    }

}
