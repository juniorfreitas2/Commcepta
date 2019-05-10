<?php

namespace App\Repositories;

use App\Models\VendaItem;
use App\Core\BaseRepository;
use App\Repositories\VendaRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\ProdutoEstoqueRepository;
use DB;

class VendaItemRepository extends BaseRepository
{
    public function __construct(
        VendaItem $model,
        VendaRepository $vendaRepository,
        ProdutoRepository $produtoRepository,
        ProdutoEstoqueRepository $produtoEstoqueRepository
    ){
        $this->model = $model;
        $this->vendaRepository = $vendaRepository;
        $this->produtoRepository = $produtoRepository;
        $this->produtoEstoqueRepository = $produtoEstoqueRepository;
    }

    public function addItemVenda($data)
    {
        if(is_null($data['vit_qtd']) || is_null($data['desconto'])) {
            return false;
        }
    
        $venda = $this->vendaRepository->find($data['vit_vnd_id']);

        if(!$venda){
            return false;
        }

        $produto = $this->produtoRepository->getInfoProdutos($data['vit_pro_id']);
     
        if(!$produto){
            return false;
        }
        
        if($data['vit_qtd'] > $produto->pes_qtd_disponivel) {
            return false;
        }
        
        if($data['desconto'] > $produto->pro_max_desconto) {
            return false;
        }
        //reservo a quantidade adicionada em estoque
        $produto->produtoEstoque->pes_qtd_reservada = $produto->pes_qtd_reservada + $data['vit_qtd'];
        $produto->produtoEstoque->pes_qtd_disponivel = $produto->pes_qtd_disponivel - $data['vit_qtd'];

        //calculo os subtotais do produto
        $totalBruto = $produto->pro_valor * $data['vit_qtd'];
        $data['vit_total_bruto'] = $produto->pro_valor * $data['vit_qtd'];
        $data['vit_total_liquido'] = $data['vit_total_bruto'] -  $data['desconto'] * $produto->pro_valor/100;
        
        try {
            DB::connection()->getPdo()->beginTransaction();
            
            $produto->produtoEstoque->save();
            
            $vendaItem = $this->model->create([
                'vit_vnd_id' => $data['vit_vnd_id'],
                'vit_pro_id' => $data['vit_pro_id'],
                'vit_qtd'    => $data['vit_qtd'],
                'vit_total_liquido' => $data['vit_total_liquido'],
                'vit_total_bruto'   => $data['vit_total_bruto'],
                'vit_total_desconto'=> $data['desconto']
            ]);

            DB::connection()->getPdo()->commit();
            return true;
        } catch (Exception $e) {
            DB::connection()->getPdo()->rollBack();
            return false;
        }
    }
}