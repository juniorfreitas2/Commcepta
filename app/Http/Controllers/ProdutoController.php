<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Repositories\ProdutoRepository;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends BaseController
{
    public function __construct(ProdutoRepository $produtoRepository) {
        $this->produtoRepository = $produtoRepository; 
    }

    public function index()
    {
        $produtos = $this->produtoRepository->all();

        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(ProdutoRequest $request)
    {
        try {
            $data = $request->all();
            
            //Converte valor em padrao americano
            $data['pro_valor'] =  str_replace(['.', ',', 'R$ '], ['', '.', ''], $data['pro_valor']);
            $data['pro_max_desconto'] =  str_replace(['%'], [''], $data['pro_max_desconto']);

            $produto = $this->produtoRepository->create($data);
            
            if (!$produto) {
                return redirect()->back()->withInput($request->all())->with('error', 'Produto não existe');
            }
            
            return redirect()->route('produtos.index')->with('message', 'Produto Salvo');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
        }
    }

    public function edit($id)
    {
        $produto = $this->produtoRepository->find($id);
            
        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não existe');
        }
        //converte pro formato brasileiro
        $produto->pro_valor = number_format($produto->pro_valor , 2, ',', '.');

        return view('produto.edit', compact('produto'));
    }

    public function update(ProdutoRequest $request, $id)
    {
        try {
            $data = $this->produtoRepository->find($id);

            if (!$data) {
                return redirect()->back()->withInput($request->all())->with('error', 'Produto não existe');
            }
        
            //Converte valor em padrao americano
            $request['pro_valor'] =  str_replace(['.', ',', 'R$ '], ['', '.', ''], $request['pro_valor']);
            $request['pro_max_desconto'] =  str_replace(['%'], [''], $request['pro_max_desconto']);
            
            if (!$this->produtoRepository->update($request->all(), $data->pro_id, 'pro_id')){
                return redirect()->back()->withInput($request->all())->with('error', 'Erro ao atualizar');
            }

            return redirect()->route('produtos.index')->with('message', 'Produto atualizado');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
            }
        }

    }

    public function destroy($id)
    {
        try {
            if ($this->produtoRepository->delete($id)) {
                return redirect()->back()->with('message', 'Produto excluido');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir');;
            }
            
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
            }
        }
    }
}
