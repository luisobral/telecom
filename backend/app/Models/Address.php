<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Address extends Model
{
    
    /**
     * Summary of table
     *
     * @var string
     */
    protected $table = "address";

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
        'rua','numero','CEP','bairro','cidade','estado','Pais', 'clients_id'
    ];

    

    /**
     * Summary of endereco
     *
     * 
     */
    public function clients()
    {
        return $this->belongsTo(Serie::class);
    }
}
