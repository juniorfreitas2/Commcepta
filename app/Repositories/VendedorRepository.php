<?php

namespace App\Repositories;

use App\Models\Vendedor;
use App\Core\BaseRepository;

class VendedorRepository extends BaseRepository
{
    public function __construct(Vendedor $model)
    {
        $this->model = $model;
    }
}