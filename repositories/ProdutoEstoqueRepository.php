<?php

namespace App\Repositories;

use App\Model\ProdutoEstoque;
use App\Core\BaseRepository;

class ProdutoEstoqueRepository extends BaseRepository
{
    public function __construct(ProdutoEstoque $model)
    {
        $this->model = $model;
    }
}