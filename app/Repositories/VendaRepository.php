<?php

namespace App\Repositories;

use App\Models\Venda;
use App\Core\BaseRepository;
use DB;

class VendaRepository extends BaseRepository
{
    public function __construct(Venda $model)
    {
        $this->model = $model;
    }

    public function finalizar($model)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            
            $model->vnd_status = 'F';
            $model->save();

            //baixa nos produtos reservados
            foreach($model->vendaItem as $item) {
                $produtoEstoque = $item->produto->produtoEstoque;
                $produtoEstoque->pes_qtd_reservada = $produtoEstoque->pes_qtd_reservada - $item->vit_qtd;
                $produtoEstoque->save();
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (Exception $e) {
            DB::connection()->getPdo()->rollBack();
            return false;
        }
    }
    
    public function getVendasFiltered($filtros)
    {
        $data = $this->model;

        if(!empty($filtros['date']) && isset($filtros['date'])) {
            $data = $data->whereDate('created_at','>=',$filtros['date']);
        }

        if(!empty($filtros['dateFim']) && isset($filtros['dateFim'])) {
            $data = $data->whereDate('created_at','<=', $filtros['dateFim']);
        }

        if(!empty($filtros['status']) && isset($filtros['status'])) {
            $data = $data->where('vnd_status',$filtros['status']);
        }

        return $data->get();
    }
}