@extends('base')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-cart"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Carrinhos</h3>
                    <small>Lista de Carrinhos</small>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-1" aria-expanded="true"> <i class="fa fa-circle text-primary"></i> Ativos</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2" aria-expanded="false"> <i class="fa fa-circle text-danger"></i> Cancelados</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body ">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach($carts as $item)
                                    <div class="col-md-4 princing-item red animated fadeInDown">
                                        <div class="panel panel-filled panel-c-primary">
                                            <div class="panel-heading">
                                                <div class="panel-tools">
                                                    <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                                    <a class="panel-close"><i class="fa fa-times"></i></a>
                                                </div>
                                                Criado em: {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->FS32A_DT)->format('d/m/Y')}}
                                            </div>
                                            <div class="panel-body">
                                                <table class="table small m-t-sm">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong class="c-white">Usuario:</strong> {{$item->user->FS28C_EMAIL}}
                                                        </td>
                                                        <td>
                                                            <strong class="c-white">Total venda:</strong> {{$item->FS32A_TOTAL_VENDA}}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong class="c-white">Qtd itens:</strong> {{$item->FS32A_QTD_ITENS}}
                                                        </td>
                                                        <td>
                                                            <strong class="c-white">Status</strong> {{$item->FS32A_STATUS}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong class="c-white">Ativo:</strong> {{$item->FS32A_ATIVO}}
                                                        </td>
                                                        <td>
                                                            <strong class="c-white">Prazo:</strong> {{$item->FS32A_ID_PRAZO}}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.--}}
                                            </div>
                                            <div class="panel-footer text-center">Acessar</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <strong class="c-white">Donec quam felis</strong>
                    </div>
                </div>
            </div>


        </div>
    </div>
@stop
@section('js')
<script>
    $(document).ready(function () {
        $('#navbar > div > a > i').trigger('click');
    })
</script>
@stop