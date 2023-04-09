<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    /**
     * Chave primária da tabela.
     * @var BigInt
     */
    protected $primaryKey = 'id';    

}
