<?php

namespace App\Models;

use App\Models\Clients;
use App\Models\OrdemServicoItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class OrdemServico extends Model 
{
    /**
     * Summary of table
     *
     * @var string
     */
    protected $table = "ordem_servico";

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
        'clients_id'
    ];

    /**
     * Summary of endereco
     *
     * 
     */
    public function clients()
    {
        return $this->belongsTo(Clients::class, 'clients_id');
    }

    /**
     * Summary of endereco
     *
     * 
     */
    public function ordemservicoitem()
    {
        return $this->hasMany(OrdemServicoItem::class, 'status_id');
    }
}
