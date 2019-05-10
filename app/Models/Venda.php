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

    public function vendedor()
    {
        return $this->hasOne('App\Models\Vendedor', 'ven_id', 'vnd_ven_id');
    }

    public function vendaItem()
    {
        return $this->hasMany('App\Models\VendaItem', 'vit_vnd_id', 'vnd_id');
    }
}