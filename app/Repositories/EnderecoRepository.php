<?php

namespace App\Repositories;

use App\Models\Endereco;
use App\Core\BaseRepository;

class EnderecoRepository extends BaseRepository
{
    public function __construct(Endereco $model)
    {
        $this->model = $model;
    }
}