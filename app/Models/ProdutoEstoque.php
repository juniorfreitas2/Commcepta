<?php
namespace App\Models;

use App\Core\BaseModel;

class ProdutoEstoque extends BaseModel
{

    protected $primaryKey = 'pes_id';

    protected $table = 'produto_estoque';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pes_pro_id',
		'pes_qtd_reservada',
		'pes_qtd_disponivel'
    ];

}