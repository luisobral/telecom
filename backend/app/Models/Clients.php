<?php

namespace App\Models;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Clients extends Model 
{
    /**
     * Summary of table
     *
     * @var string
     */
    protected $table = "clients";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','cpf'
    ];

    /**
     * Summary of endereco
     *
     * 
     */
    public function address()
    {
        return $this->hasMany(Endereco::class, 'clients_id');
    }
}
