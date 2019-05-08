@extends('base')

@section("content")
    <style>
        .panel-footer:hover{
            cursor: pointer;
        }
        .icons-hover{
            color: #f6a821
        }
        .panel-footer:hover {
            background-color: #e8d0d040;
            border: none;
        }
        div.panel-footer.text-center{
            background-color:#80808047;
        }
    </style>
    <div class="col-md-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li><a class="nav-link show active" data-toggle="tab" href="#tab-1" aria-expanded="true"> Empresa</a></li>
                <li><a class="nav-link show " data-toggle="tab" href="#tab-2" aria-expanded="false">Acesso</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane show active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div>
                                    <i class="fa fa-building-o" style="font-size: 3em;color: #f6a821;"> </i>
                                    <h2 class="m-t-xs m-b-none">
                                        {{$empresa->FS28A_EMAIL}}
                                    </h2>
                                    <small>
                                        {{$empresa->FS28A_DESCRICAO}}
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4 pull right">
                                @if($empresa->FS28A_ATIVO == 1)
                                    <span class="label label-primary pull-right " style="font-size: 1em;margin-bottom: 10px;"> Ativo</span>
                                @else
                                    <span class="label label-danger pull-right " style="font-size: 1em;margin-bottom: 10px;"> Cancelado</span>
                                @endif
                                <table class="table small m-t-sm">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong class="c-white">122</strong> Projects
                                        </td>
                                        <td>
                                            <strong class="c-white">42</strong> Active project
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <strong class="c-white">61</strong> Comments
                                        </td>
                                        <td>
                                            <strong class="c-white">84</strong> Articles
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong class="c-white">244</strong> Tags
                                        </td>
                                        <td>
                                            <strong class="c-white">42</strong> Friends
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane show ">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div>
                                    <i class="fa fa-unlock-alt" style="font-size: 3em;color: #f6a821;"> </i>
                                    <h2 class="m-t-xs m-b-none">
                                        {{$empresa->appAcesso->FS28B_DESCRICAO}}
                                    </h2>
                                    <small>
                                        Criado em: {{$empresa->appAcesso->FS28B_DT}}
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4 pull right">
                                @if($empresa->appAcesso->FS28B_ATIVO == 1)
                                    <span class="label label-primary pull-right " style="font-size: 1em;margin-bottom: 10px;"> Ativo</span>
                                @else
                                    <span class="label label-danger pull-right " style="font-size: 1em;margin-bottom: 10px;"> Cancelado</span>
                                @endif
                                <table class="table small m-t-sm">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong class="c-white">122</strong> Projects
                                        </td>
                                        <td>
                                            <strong class="c-white">42</strong> Active project
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <strong class="c-white">61</strong> Comments
                                        </td>
                                        <td>
                                            <strong class="c-white">84</strong> Articles
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong class="c-white">244</strong> Tags
                                        </td>
                                        <td>
                                            <strong class="c-white">42</strong> Friends
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-filled panel-c-success">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                            <a class="panel-close"><i class="fa fa-times"></i></a>
                        </div>
                        Usuários
                    </div>
                    <div class="panel-body"style="padding: 0px">
                        <div class="row">
                            <div class="col-md-6 pull-left">
                                <div class="text-center">
                                    <i class="fa fa-user text-center icons-hover" style="font-size: 6em;padding: 16px;"> </i>
                                </div>
                            </div>
                            <div class="col-md-6 pull-right">
                                <table class="table small m-t-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                    <tbody>
                                    <tr>
                                        <td style="padding: 5px">
                                            Registrar usuários
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Recuperar perfil
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Recuperar RCA
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Recuperar Prazos
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            ....
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   <div class="panel-footer text-center"><a href="{{url('/userapp')}}">Acessar </a><i class=""></i></div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-filled panel-c-success">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                            <a class="panel-close"><i class="fa fa-times"></i></a>
                        </div>
                        Carrinho
                    </div>
                    <div class="panel-body"style="padding: 0px">
                        <div class="row">
                            <div class="col-md-6 pull-left">
                                <div class="text-center">
                                    <i class="fa fa-shopping-cart text-center icons-hover" style="font-size: 6em;padding: 16px;"> </i>
                                </div>
                            </div>
                            <div class="col-md-6 pull-right">
                                <table class="table small m-t-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                    <tbody>
                                    <tr>
                                        <td style="padding: 5px">
                                            Carrinho de compras
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Adicionar itens
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Remover itens
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Recuperar itens
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            ....
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center"><a href="{{url('/cart')}}">Acessar </a> <i class=""></i></div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-filled panel-c-success">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                            <a class="panel-close"><i class="fa fa-times"></i></a>
                        </div>
                        Pedido
                    </div>
                    <div class="panel-body"style="padding: 0px">
                        <div class="row">
                            <div class="col-md-6 pull-left">
                                <div class="text-center">
                                    <i class="fa fa-edit text-center icons-hover" style="font-size: 6em;padding: 16px;"> </i>
                                </div>
                            </div>
                            <div class="col-md-6 pull-right">
                                <table class="table small m-t-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                    <tbody>
                                    <tr>
                                        <td style="padding: 5px">
                                            Enviar pedido
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Listar pedidos
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Listar pedidos por status
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px">
                                            Detalhes do pedido
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            ....
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center"><a href="{{url('/order')}}">Acessar </a> <i class=""></i></div>
                </div>

            </div>
        </div>
    </div>
@stop