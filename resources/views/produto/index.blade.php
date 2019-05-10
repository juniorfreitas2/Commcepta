@extends('base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="fa fa-cube"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Produtos</h3>
                    <small>Lista de Produtos</small>
                </div>
                <div class="text-right">
                    <a href="{{url('/produtos/create')}}" class="btn btn-w-md btn-primary">Novo</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="">
        <div class="panel">
            <div class="panel-body">
                @if(count($produtos))
                    <table class="table table-vertical-align-middle table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Desconto maximo</th>
                            <th>Qtd disponivel</th>
                            <th>Qtd reservado</th>
                            <th class="text-center">
                                AÇÃO
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $item)
                                <tr>
                                    <td>{{$item->pro_id}}</td>
                                    <td ><a href="#">{{$item->pro_nome}}</a></td>
                                    <td >R$ {{number_format($item->pro_valor , 2, ',', '.')}}</td>
                                    <td>{{$item->pro_max_desconto}} %</td>
                                    <td>{{$item->produtoEstoque ? $item->produtoEstoque->pes_qtd_disponivel: ""}}</td>
                                    <td>{{$item->produtoEstoque ? $item->produtoEstoque->pes_qtd_reservada : ""}}</td>
                                    <td class="text-center" >
                                        <div class="btn-group ">
                                            <a href="{{url('/produtos/'.$item->pro_id.'/edit')}}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                                            {!!Form::open(['method' => 'delete', 'route'=> array('produtos.destroy',$item->pro_id) ])!!}
                                                <button type="submit" title="Clique para excluir" class="btn btn-default btn-xs"><i class="fa fa-trash"></i>Excluir </button>
                                            {!!Form::close()!!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <h4>Nenhum registro encontrado</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop