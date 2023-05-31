<?php

namespace App\Models;

use App\Models\Produtos;
use App\Models\OrdemServico;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class OrdemServicoItem extends Model 
{
    /**
     * Summary of table
     *
     * @var string
     */
    protected $table = "ordem_servico_item";

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
        'quantidade','ordem_servico_id', 'produtos_id'
    ];

    /**
     * Summary of endereco
     *
     * 
     */
    public function ordemservico()
    {
        return $this->belongsTo(OrdemServico::class, 'ordem_servico_id');
    }

    /**
     * Summary of endereco
     *
     * 
     */
    public function produtos()
    {
        return $this->belongsTo(Produtos::class, 'produtos_id');
    }
}
