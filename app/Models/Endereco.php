<?php

namespace App\Models;
use App\Core\BaseModel;

class Endereco extends BaseModel
{

    protected $primaryKey = 'end_id';

    protected $table = 'enderecos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'end_cep',
		'end_logradouro',
		'end_numero',
		'end_bairro',
		'end_estado',
		'end_cidade'
    ];

}