@extends('base')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-cart"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Vendas</h3>
                    <small>Lista das vendas</small>
                </div>
                <div class="text-right">
                    <a href="{{url('/vendas/create')}}" class="btn btn-w-md btn-primary">Nova venda</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="">
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar por nome.." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="account" style="width: 100%">
                                    <option selected="">Situação</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->

        <div class="row">
            @if(count($vendas))
                @foreach($vendas as $item)
                <div class="col-md-4 princing-item red animated fadeInDown">
                    <div class="panel panel-filled panel-c-primary">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            {{$item->vendedor->ven_nome}}
                        </div>
                        <div class="panel-body">
                            <table class="table small m-t-sm">
                                <tbody>
                                <tr>
                                    <td>
                                        <strong class="c-white">Vendedor:</strong> {{$item->vendedor->ven_nome}}
                                    </td>
                                    <td>
                                        <strong class="c-white">Total venda:</strong> {{number_format($item->vendaItem->sum('vit_total_liquido') , 2, ',', '.')}}</td>

                                </tr>
                                <tr>
                                    <td>
                                        <strong class="c-white">Qtd itens:</strong> {{$item->vendaItem->count()}}
                                    </td>
                                    <td>
                                        <strong class="c-white">Status</strong> {{$item->vnd_status == 'R'? 'Rascunho' : 'Finalizada'}}
                                    </td>
                                </tr>
                               
                                </tbody>
                            </table>

                        </div>
                        <div class="panel-footer text-center">
                            <a type="button" href="{{route('vendas.show', [$item->vnd_id],false)}}"  style="font-size:15px" class="btn btn-default btn-xs">Acessar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
    </div>
@stop
