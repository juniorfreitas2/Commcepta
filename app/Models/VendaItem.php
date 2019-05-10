<?php
namespace App\Models;

use App\Core\BaseModel;

class VendaItem extends BaseModel
{

    protected $primaryKey = 'vit_id';

    protected $table = 'venda_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vit_vnd_id',
		'vit_pro_id',
        'vit_qtd',
        'vit_total_liquido',
        'vit_total_bruto',
        'vit_total_desconto'
    ];

    public function produto()
    {
        return $this->hasOne('App\Models\Produto', 'pro_id', 'vit_pro_id');
    }
}