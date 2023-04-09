<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    /**
     * Chave primária da tabela.
     * @var BigInt
     */
    protected $primaryKey = 'id';    

    public function getComments(): Array
    {
        return [];
    }

    /**
     * pega os comentários do post
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }

}
