<?php
namespace App\Models;

use App\Core\BaseModel;

class Venda extends BaseModel
{

    protected $primaryKey = 'vnd_id';

    protected $table = 'vendas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vnd_ven_id',
		'vnd_status'
    ];

}