<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Repositories\ProdutoRepository;
use App\Repositories\VendaItemRepository;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    public function __construct(
        ProdutoRepository $produtoRepository,
        VendaItemRepository $vendaItemRepository
    ){
        $this->produtoRepository = $produtoRepository;
        $this->vendaItemRepository = $vendaItemRepository; 
    }

    public function getInfoProduto($id) 
    {
        $produto = $this->produtoRepository->getInfoProdutos($id);

        if(!$produto)
            return Response(['msg'=> 'Erro ao buscar produto'], 500);
        
        return Response($produto, 200)->withHeaders(['Content-Type: application/json']);
    }

    public function addItem(Request $request)
    {
        $produto = $this->vendaItemRepository->addItemVenda($request->all());

        if(!$produto)
            return Response(['msg'=> 'Erro ao adicionar produto'], 500);
        
            return Response(200)->withHeaders(['Content-Type: application/json']);
    }
}
