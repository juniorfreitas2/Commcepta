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
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }

            // send flash message success
            return redirect()->route('produtos.index');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            // send flash message custom error
            return redirect()->route('produtos.index');
        }
    }

    public function edit($id)
    {
        $produto = $this->produtoRepository->find($id);
            
        if (!$produto) {
            // send flash message error
            return redirect()->back();
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
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }
        
            //Converte valor em padrao americano
            $request['pro_valor'] =  str_replace(['.', ',', 'R$ '], ['', '.', ''], $request['pro_valor']);
            $request['pro_max_desconto'] =  str_replace(['%'], [''], $request['pro_max_desconto']);
            
            if (!$this->produtoRepository->update($request->all(), $data->pro_id, 'pro_id')){
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }

            // send flash message success
            return redirect()->route('produtos.index');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                 // send flash message custom error
                return redirect()->back();
            }
        }

    }

    public function destroy($id)
    {
        try {
            if ($this->produtoRepository->delete($id)) {
                // send flash message success
            } else {
                // send flash message error
            }
            return redirect()->back();
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                // send flash message custom error
                return redirect()->back();
            }
        }
    }
}
