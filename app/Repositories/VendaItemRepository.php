<?php

namespace App\Repositories;

use App\Models\VendaItem;
use App\Core\BaseRepository;

class VendaItemRepository extends BaseRepository
{
    public function __construct(VendaItem $model)
    {
        $this->model = $model;
    }
}