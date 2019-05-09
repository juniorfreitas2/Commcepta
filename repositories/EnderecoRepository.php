<?php

namespace App\Repositories;

use App\Model\Endereco;
use App\Core\BaseRepository;

class EnderecoRepository extends BaseRepository
{
    public function __construct(Endereco $model)
    {
        $this->model = $model;
    }
}