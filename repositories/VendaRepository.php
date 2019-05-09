<?php

namespace App\Repositories;

use App\Model\Venda;
use App\Core\BaseRepository;

class VendaRepository extends BaseRepository
{
    public function __construct(Venda $model)
    {
        $this->model = $model;
    }
}