<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Produtos extends Model 
{
    /**
     * Summary of table
     *
     * @var string
     */
    protected $table = "produtos";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'descricao', 'garantia', 'status_id'
    ];

    /**
     * Summary of endereco
     *
     * 
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
