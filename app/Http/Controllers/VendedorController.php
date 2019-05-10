<?php

namespace App\Http\Controllers;

use App\Core\BaseController;
use App\Repositories\VendedorRepository;
use App\Http\Requests\VendedorRequest;
use Carbon\Carbon;

class VendedorController extends BaseController
{
    public function __construct(VendedorRepository $vendedorRepository) {
        $this->vendedorRepository = $vendedorRepository; 
    }

    public function index()
    {
        $vendedores = $this->vendedorRepository->all();

        return view('vendedor.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedor.create');
    }

    public function store(VendedorRequest $request)
    {
        try {
            $data = $request->all();
            $vendedor = $this->vendedorRepository->create($data);
            
            if (!$vendedor) {
                return redirect()->back()->withInput($request->all())->with('error', 'Erro ao salvar');
            }

            return redirect()->route('vendedores.index')->with('message', 'Salvo com sucesso');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
        }
    }

    public function edit($id)
    {
        $vendedor = $this->vendedorRepository->find($id);
            
        if (!$vendedor) {
            return redirect()->back()->with('error', 'Vendedor não existe');
        }
 
        return view('vendedor.edit', compact('vendedor'));
    }

    public function update(VendedorRequest $request, $id)
    {
        try {
            $data = $this->vendedorRepository->find($id);

            if (!$data) {
                return redirect()->back()->withInput($request->all())->with('error', 'Vendedor não existe');
            }

            if (!$this->vendedorRepository->update($request->all(), $data->ven_id, 'ven_id')){
                return redirect()->back()->withInput($request->all())->with('error', 'Erro ao atualizar');
            }

            return redirect()->route('vendedores.index')->with('message', 'Salvo com sucesso');
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
            if ($this->vendedorRepository->delete($id)) {
                return redirect()->back()->with('message', 'Vendedor excluido');
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
