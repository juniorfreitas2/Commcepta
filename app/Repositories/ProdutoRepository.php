<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Core\BaseRepository;

class ProdutoRepository extends BaseRepository
{
    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function getProdutosDisponivels() 
    {
        $produtos = $this->model
            ->join('produto_estoque', 'pro_id', 'pes_pro_id')
            ->where('pes_qtd_disponivel', '>', 0)
            ->get();
        
        return $produtos;
    }

    public function getInfoProdutos($id) 
    {
        $produto = $this->model
            ->join('produto_estoque', 'pro_id', 'pes_pro_id')
            ->where('pro_id', '=', $id)
            ->first();
        
        return $produto;
    }
}