@extends('base')
@section("css")
    <link rel="stylesheet" href="{{asset('/theme/vendor/select2/dist/css/select2.min.css')}}">
@stop
@section("content")
    <style>
        .btn-default:hover{
            border-color: #f6a821;
        }
    </style>
    <div class="col-md-12">
        <div class="panel panel-filled">

            <div class="panel-body"style="padding-bottom: 0px">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <i class="pe pe-7s-user c-accent fa-3x"></i> <span style="font-size: 28px;color: white;"> {{$usuario->FS28C_EMAIL}}</span>
                        </div>
                        <table class="table table-condensed" style="font-size: 14px;">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Ativo</th>
                                <th>Tipo Domain</th>
                                <th>Status</th>
                                <th>UUID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$usuario->FS28C_USERNAME}}</td>
                                <td>
                                    @if($usuario->FS28C_ATIVO == 1)
                                        <span class="label label-primary pull-right " style="font-size: 1em;"> Ativo</span>
                                    @else
                                        <span class="label label-danger pull-right " style="font-size: 1em;"> Cancelado</span>
                                    @endif
                                </td>
                                <td>{{$usuario->FS28C_TIPO_DOMAIN}}</td>
                                <td>{{$usuario->FS28C_STATUS}}</td>
                                <td>{{$usuario->FS28C_UUID}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3 m-t-sm" style="padding: 13px"><span class="c-white">Cliente relacionado</span>
                        <br>
                        <small>
                            Descrição: {{$usuario->cliente->FS12A_DESCRICAO}}<br>
                            CPF/CNPJ: {{$usuario->cliente->FS12A_CPF_CNPJ}}<br>
                            Email: {{$usuario->cliente->FS12A_EMAIL_CONTATO}}
                        </small>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h4> Endpoints Disponíveis</h4>

                    <div class="v-timeline vertical-container">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                        <small>
                                            <a href="#" class="btn btn-sm btn-default" id="getLimite">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Recuperar Limite</h2>

                                    <p>Exibe o limite de crédito disponível para o cliente.</p>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                        <small>
                                            <a href="#" class="btn btn-sm btn-default" id="getPerfil">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Recuperar o perfil</h2>

                                    <p>Exibe as informações do perfil do cliente</p>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                        <small>
                                            <a href="#" class="btn btn-sm btn-default" id="getRca">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Recuperar Representante</h2>

                                    <p>Exibe informações sobre o o representante responsável
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                        <small>
                                            <a href="#" class="btn btn-sm btn-default" id="getPagamentos">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Recuperar Formas de pagamento</h2>

                                    <p>Exibe as formas de pagamento disponíveis
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                        <small>
                                            <a href="#" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalPrazos">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Recuperar Prazos</h2>

                                    <p>Exibe os prazos disponíveis
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-md">
                            <div class="modal fade" id="modalPrazos" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title">Recuperar prazos</h4>
                                            <small>Preencha os parâmetros da requisição.</small>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(["id" => "formPrazo"]) !!}
                                                {!! Form::label('prazos', 'Selecione uma Forma de pagamento') !!}
                                                {!! Form::select('prazos', $formasPagamentos, old('prazos'), ['class' => 'form-control', 'placeholder' => 'Selecione']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-accent" id="getPrazos" >Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                        <small>
                                            <a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalProduto">
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Recuperar Produtos</h2>

                                    <p>Exibe os produtos disponíveis
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-md">
                            <div class="modal fade" id="modalProduto" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title">Recuperar produtos</h4>
                                            <small>Pelo menos uma dessas propriedades  não pode está vazia.</small>
                                        </div>
                                        <div class="modal-body" style="padding-top: 12px; padding-bottom: 12px;">
                                            {!! Form::open(["id" => "formProduto"]) !!}
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        {!! Form::label('count', 'Total de itens por página', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                            {!! Form::text('count', 10, ['class' => 'form-control', 'id' => 'count']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        {!! Form::label('page', 'Página', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                            {!! Form::text('page', 1, ['class' => 'form-control', 'id' => 'page']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                    {{--search--}}
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('dep', 'Departamento', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                            {!! Form::select('dep', $departamento, old('dep'), ['class' => 'form-control', 'id'=>'selectDepartamento', 'style'=>'width:100%', 'placeholder'=>'Selecione']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('fab', 'Fabricante', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                            {!! Form::select('fab', $fabricante, old('fab'), ['class' => 'form-control', 'id'=>'selectFabricante', 'style'=>'width:100%', 'placeholder'=>'Selecione']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('sec', 'Categorias', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                            {!! Form::select('sec', $categorias, old('sec'), ['class' => 'form-control', 'id'=>'selectCategoria', 'style'=>'width:100%', 'placeholder'=>'Selecione']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        {!! Form::label('prod', 'Produto', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                        {!! Form::text('prod', old('prod'), ['class' => 'form-control', 'id' => 'prod']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        {!! Form::label('ord', 'Ordem', ['class' => 'control-label']) !!}
                                                        <div class="controls">
                                                            {!! Form::select('ord', [ 0 =>'A-Z',1 => 'Z-A',2 => 'MAIOR PRECO',3 => 'MENOR PRECO'], old('ord'), ['class' => 'form-control', 'style'=>'width:100%']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-accent" id="getProdutos" >Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right">
                                    <small>
                                            <a href="#" class="btn btn-sm btn-default" >
                                                <i class="fa fa-mail-forward"></i>
                                            </a>
                                        </small>
                                    </span>

                                    <h2>Atualizar o perfil do cliente</h2>

                                    <p>Abre uma página, onde será possivel atualizar as informações do perfil
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12" style="    padding-bottom: 14px;">
                <div class="">
                    {!! Form::label('label', 'Selecione uma aplicação para gerar um token') !!}
                    {!! Form::select('empresas', $empresas, old('empresas'),['class'=>'form-control', 'placeholder'=>'Selecione', 'id' => 'gerarToken']) !!}
                </div>
            </div>
            <div class="col-md-12" id="panel-load">
                <div class="panel panel-c-accent">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                            <a class="panel-close"><i class="fa fa-times"></i></a>
                        </div>
                        Output
                    </div>
                    <div class="panel-body" style="">
                        <textarea id="nestable-output" class="form-control" rows="30"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="{{asset('/theme/vendor/select2/dist/js/select2.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.left-nav-toggle > a ').trigger('click');

        $('#selectDepartamento').select2({
            dropdownParent: $('#modalProduto')
        });
        $('#selectFabricante').select2({
            dropdownParent: $('#modalProduto')
        });
        $('#selectCategoria').select2({
            dropdownParent: $('#modalProduto')
        });
    })
    function verificarToken() {
        if($('#gerarToken').val() == '') {
            return false;
        }
        return true;
    }

    $('#getLimite').click(function () {
        if(!verificarToken()){
            toastr.warning('Selecione  primeiro uma aplicação', "Atenção");
            return;
        }

        var url = "{{url('/api/clientes/getlimitecredito')}}"+'/'+$('#gerarToken').val();

        $.ajax({
            type: "GET",
            url: url,
            success: function(result){
                $("#nestable-output").html('');
                $("#nestable-output").html(result);
                toastr.success('Limite de credito recuperado', "Sucesso");
            },
            error: function(result){
                $("#nestable-output").html('');
                toastr.error(result.responseJSON.msg, 'Ooops!')
            },
            beforeSend: function(){
                $('#panel-load').addClass('.ld-loading ');
            },
            complete: function(msg){
                $('#panel-load').removeClass('.ld-loading');
            }
        });
    })

    $('#getPerfil').click(function () {
        if(!verificarToken()){
            toastr.warning('Selecione  primeiro uma aplicação', "Atenção");
            return;
        }

        var url = "{{url('/api/clientes/getperfilcliente')}}"+'/'+$('#gerarToken').val();

        $.ajax({
            type: "GET",
            url: url,
            success: function(result){
                $("#nestable-output").html('');
                $("#nestable-output").html(result);
                toastr.success('Perfil recuperado', "Sucesso");
            },
            error: function(result){
                $("#nestable-output").html('');
                toastr.error(result.responseJSON.msg, 'Ooops!')
            },
            beforeSend: function(){
                $('#panel-load').addClass('.ld-loading');
            },
            complete: function(msg){
                $('#panel-load').removeClass('.ld-loading');
            }
        });
    })

    $('#getRca').click(function () {
        if(!verificarToken()){
            toastr.warning('Selecione  primeiro uma aplicação', "Atenção");
            return;
        }

        var url = "{{url('/api/clientes/getrca')}}"+'/'+$('#gerarToken').val();

        $.ajax({
            type: "GET",
            url: url,
            success: function(result){
                $("#nestable-output").html('');
                $("#nestable-output").html(result);
                toastr.success('Representantes recuperados', "Sucesso");
            },
            error: function(result){
                $("#nestable-output").html('');
                toastr.error(result.responseJSON.msg, 'Ooops!')
            },
            beforeSend: function(){
                $('#panel-load').addClass('.ld-loading');
            },
            complete: function(msg){
                $('#panel-load').removeClass('.ld-loading');
            }
        });
    })

    $('#getPagamentos').click(function () {
        if(!verificarToken()){
            toastr.warning('Selecione  primeiro uma aplicação', "Atenção");
            return;
        }

        var url = "{{url('/api/clientes/getpayments')}}"+'/'+$('#gerarToken').val();

        $.ajax({
            type: "GET",
            url: url,
            success: function(result){
                $("#nestable-output").html('');
                $("#nestable-output").html(result);
                toastr.success('Formas de pagamento recuperados', "Sucesso");
            },
            error: function(result){
                $("#nestable-output").html('');
                toastr.error(result.responseJSON.msg, 'Ooops!')
            },
            beforeSend: function(){
                $('#panel-load').addClass('.ld-loading');
            },
            complete: function(msg){
                $('#panel-load').removeClass('.ld-loading');
            }
        });
    })

    $('#getPrazos').click(function () {
        if(!verificarToken()){
            $('#modalPrazos').modal('hide')
            toastr.warning('Selecione  primeiro uma aplicação', "Atenção");
            return;
        }

        var url = "{{url('/api/clientes/getinstallments')}}"+'/'+$('#gerarToken').val();
        var data = $('#formPrazo').serializeArray();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(result){
                $('#modalPrazos').modal('hide')
                $("#nestable-output").html('');
                $("#nestable-output").html(result);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                toastr.success('Prazos recuperados', "Sucesso");
            },
            error: function(result){
                $('#modalPrazos').modal('hide')
                $("#nestable-output").html('');
                toastr.error(result.responseJSON.msg, 'Ooops!')
            },
            beforeSend: function(){
                $('#modalPrazos').addClass('.ld-loading');
            },
            complete: function(msg){
                $('#modalPrazos').removeClass('.ld-loading');
            }
        });
    })

    $('#getProdutos').click(function () {
        if(!verificarToken()){
            $('#modalProduto').modal('hide')
            toastr.warning('Selecione  primeiro uma aplicação', "Atenção");
            return;
        }

        var url = "{{url('/api/clientes/getprodutos')}}"+'/'+$('#gerarToken').val();
        var data = $('#formProduto').serializeArray();

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(result){
                $('#modalProduto').modal('hide')
                $("#nestable-output").html('');
                $("#nestable-output").html(result);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                toastr.success('Produtos recuperados', "Sucesso");
            },
            error: function(result){
                $('#modalProduto').modal('hide')
                $("#nestable-output").html('');
                toastr.error(result.responseJSON.msg, 'Ooops!')
            },
            beforeSend: function(){
                $('#modalProduto').addClass('.ld-loading');
            },
            complete: function(msg){
                $('#modalProduto').removeClass('.ld-loading');
            }
        });
    })
</script>
@stop