<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enums\EnumLikeTipo;

class Likes extends Model
{
    use HasFactory;

    /**
     * Chave primária da tabela.
     * @var BigInt
     */
    protected $primaryKey = 'id';

    /**
     * Retorna os likes do post
     */
    public static function getLikesFromPost($id) {
        return count(Likes::where('post_id', $id)->where('tipo', EnumLikeTipo::LIKE)->get());
    }

    /**
     * Retorna os deslikes do post
     */
    public static function getDislikesFromPost($id) {
        return count(Likes::where('post_id', $id)->where('tipo', EnumLikeTipo::DISLIKE)->get());
    }

}
