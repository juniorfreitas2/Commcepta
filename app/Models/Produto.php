<?php

namespace App\Models;
use Core\BaseModel;

class Produto extends BaseModel
{

    protected $primaryKey = 'pro_id';

    protected $table = 'produtos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pro_nome',
		'pro_valor',
		'pro_max_desconto'
    ];

}