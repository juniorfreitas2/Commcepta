<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VendaRepository;
use App\Repositories\VendedorRepository;
use App\Repositories\ProdutoRepository;
use App\Http\Requests\VendaRequest;

class VendaController extends Controller
{
    public function __construct(
        VendaRepository $vendaRepository,
        VendedorRepository $vendedorRepository,
        ProdutoRepository $produtoRepository
    ){
        $this->vendaRepository = $vendaRepository;
        $this->vendedorRepository = $vendedorRepository;
        $this->produtoRepository = $produtoRepository; 
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
                return redirect()->back()->withInput($request->all())->with('error', 'Erro ao salvar');
            }

            return redirect()->route('vendas.show', [$venda->vnd_id])->with('message', 'Salvo com sucesso');
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return redirect()->back()->with('error', 'Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');
        }
    }

    public function show($id)
    {
        $venda = $this->vendaRepository->find($id);
            
        if (!$venda) {
            return redirect()->back()->with('error', 'Venda não existe');
        }
        $produtos = $this->produtoRepository->getProdutosDisponivels();
        $produtosAdicionados = $venda->vendaItem;
        
        return view('venda.view', compact('produtos', 'venda', 'produtosAdicionados'));
    }

    public function finalizar(Request $request)
    {
        $id = $request->get('id');
        $venda = $this->vendaRepository->find($id);
            
        if (!$venda) {
            return redirect()->back()->with('error', 'Venda não existe');
        }
        $finalizada = $this->vendaRepository->finalizar($venda);

        if(!$finalizada) {
            return redirect()->back()->with('error', 'Erro ao salvar');
        }
        
        return redirect()->route('vendas.index')->with('message', 'Salvo com sucesso');
    }

    public function getRelatorio(Request $request) 
    {
        $data = $this->vendaRepository->getVendasFiltered($request->all());
        
        return view('venda.relatorio', compact('data'));
    }
}
