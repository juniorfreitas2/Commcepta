@extends('base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-user"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Vendedores</h3>
                    <small>Lista de Vendedores</small>
                </div>
                <div class="text-right">
                    <a href="{{url('/vendedores/create')}}" class="btn btn-w-md btn-primary">Novo</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="">
        <div class="panel">
            <div class="panel-body">
                @if(count($vendedores))
                    <table class="table table-vertical-align-middle table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th class="text-center">
                                AÇÃO
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($vendedores as $item)
                                <tr>
                                    <td>{{$item->ven_id}}</td>
                                    <td ><a href="#">{{$item->ven_nome}}</a></td>
                                    <td>
                                        @if($item->ven_ativo)
                                            <span class="label label-primary">Ativo</span>
                                        @else
                                            <span class="label label-danger">Cancelado</span>
                                        @endif
                                    </td>
                                    <td >{{$item->ven_cpf}}</td>
                                    <td>{{$item->ven_email}}</td>
                                    <td class="text-center" >
                                        <div class="btn-group ">
                                            <a href="{{url('/vendedores/'.$item->ven_id.'/edit')}}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                                            {!!Form::open(['method' => 'delete', 'route'=> array('vendedores.destroy',$item->ven_id) ])!!}
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