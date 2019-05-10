<?php
namespace App\Models;

use App\Core\BaseModel;

class Vendedor extends BaseModel
{
    protected $primaryKey = 'ven_id';

    protected $table = 'vendedores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ven_nome',
		'ven_cpf',
		'ven_sexo',
		'ven_nascimento',
		'ven_celular',
		'ven_email',
		'ven_ativo',
		'ven_observacao'
    ];

}