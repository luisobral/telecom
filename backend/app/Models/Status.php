<?php

namespace App\Models;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Status extends Model 
{
    /**
     * Summary of table
     *
     * @var string
     */
    protected $table = "statuses";

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
        'descricao'
    ];

    /**
     * Summary of endereco
     *
     * 
     */
    public function produtos()
    {
        return $this->hasMany(Produtos::class, 'status_id');
    }
}
