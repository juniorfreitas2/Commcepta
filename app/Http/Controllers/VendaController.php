<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VendaRepository;
use App\Repositories\VendedorRepository;
use App\Http\Requests\VendaRequest;

class VendaController extends Controller
{
    public function __construct(
        VendaRepository $vendaRepository,
        VendedorRepository $vendedorRepository
    ){
        $this->vendaRepository = $vendaRepository;
        $this->vendedorRepository = $vendedorRepository; 
    }

    public function index()
    {
        $vendas = $this->vendaRepository->all();
        
        return view('venda.index', compact('vendas'));
    }

    public function create()
    {
        $vendedores = $this->vendedorRepository->where('ven_ativo','=', 1)->get()->pluck('ven_nome', 'ven_id');

        return view('venda.create', compact('vendedores'));
    }

    public function store(VendaRequest $request)
    {
        try {
            $data = $request->all();
            $data['vnd_status'] = 'R';
            $venda = $this->vendaRepository->create($data);
            
            if (!$venda) {
                // send flash message error
                return redirect()->back()->withInput($request->all());
            }

            // send flash message success
            return redirect()->route('vendas.show', [$venda->vnd_id]);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            // send flash message custom error
            return redirect()->route('venda.index');
        }
    }

    public function show($id)
    {
        return view('venda.view');
    }

    public function edit($id)
    {
        //
    }

    public function update(VendaRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
