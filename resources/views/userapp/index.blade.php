@extends('base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-user"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Usuários</h3>
                    <small>Lista de usuários</small>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="">
    <div class="col-md-12">
        <div class="panel panel-filled">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group m-b-xs m-t-xs">
                            <input type="text" class="form-control" placeholder="Nome" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-control m-b-xs m-t-xs" name="account" style="width: 100%">
                            <option selected="">Status</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-control m-t-xs" name="account" style="width: 100%">
                            <option selected="">Sort by:</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-body">
                @if(count($usuarios))
                    <table class="table table-vertical-align-middle table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Ativo</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th class="text-center">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $item)
                                <tr>
                                    <td>{{$item->FS28C_ID}}</td>
                                    <td ><a href="#">{{$item->FS28C_EMAIL}}</a></td>
                                    <td>
                                        @if($item->FS28C_ATIVO)
                                            <span class="label label-primary">Ativo</span>
                                        @else
                                            <span class="label label-danger">Cancelado</span>
                                        @endif
                                    </td>
                                    <td >{{$item->FS28C_USERNAME}}</td>
                                    <td>{{$item->FS28C_STATUS}}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{url('/userapp/'.$item->FS28C_ID)}}" class="btn btn-default btn-xs"><i class="fa fa-folder"></i> Visualizar</a>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> Editar</button>
                                            <button class="btn btn-default btn-xs"><i class="fa fa-trash"></i> excluir</button>
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