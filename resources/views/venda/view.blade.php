@extends('base')

@section("content")
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-filled">
            <div class="panel-heading">Produtos adicionados</div>
            <div class="panel-body">
                @if(count($produtosAdicionados))
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtosAdicionados as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->produto->pro_nome}}</td>
                            <td>{{$item->vit_qtd}}</td>
                            <td>R$ {{number_format($item->vit_total_liquido , 2, ',', '.')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <h4>Nenhum produto Adicionado</h4>
                @endif
            </div>
            <div class="panel-footer text-right" >Total venda:R$ {{number_format($venda->vendaItem->sum('vit_total_liquido') , 2, ',', '.')}}</div>
        </div>
    </div>

    @if($venda->vnd_status == 'R')
    <div class="col-md-4">
        <div class="panel panel-filled ">
            <div class="panel-heading">Produtos disponiveis</div>
            <div class="panel-body">
                @if(count($produtos))
                    <table class="table table-hover table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Qtd.</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($produtos as $item)
                        <tr>
                            <td>
                                <a class="btn btn-default btn-sm btnAdd" proId={{$item->pro_id}}>
                                    <i class="fa fa-plus"></i>
                                </a>
                            </td>
                            <td>{{$item->pro_nome}}</td>
                            <td>{{$item->pro_valor}}</td>
                            <td>{{$item->pes_qtd_disponivel}}</td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                @else
                    <h4>Nenhum produto disponivel</h4>
                @endif
            </div>
            <div class="panel-footer">
            <div class="text-right">
                {!!Form::open(['method' => 'post', 'route'=> array('vendas.finalizar') ])!!}
                    {!!Form::hidden('id', $venda->vnd_id) !!}
                    <button type="submit" title="Clique para finalizar" class="btn btn-w-md btn-success"><i class="fa fa-send"></i> Finalizar </button>
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="m-t-md">
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title">Adiciona item</h4>
                <small>Preencha os parâmetros.</small>
            </div>
            <div class="" style= "padding:0px">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Disponivel</th>
                            <th>Reservado</th>
                            <th>Max. Desconto</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <p id="nome"></p> </td>
                        <td> <span id="valor"></span> </td>
                        <td> <span id="disponivel"></span> </td>
                        <td> <span id="reservado"></span> </td>
                        <td> <span id="maxDesconto"></span> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-body">
                {!! Form::open(["id" => "form"]) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('vit_qtd', 'Quantidade') !!}
                        <div class="controls">
                            {!! Form::number('vit_qtd', old('vit_qtd'), ['class' => 'form-control', 'id'=> 'vit_qtd']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('desconto', 'Desconto') !!}
                        <div class="controls">
                            {!! Form::number('desconto', old('desconto'), ['class' => 'form-control', 'id'=> 'desconto']) !!}
                        </div>
                    </div>
                </div>
                    
                <input type="hidden" name= "vit_pro_id" id="vit_pro_id">
                {!! Form::hidden('vit_vnd_id', $venda->vnd_id)!!}
                    
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-accent" id="salvarItem" >Enviar</button>
            </div>
        </div>
    </div>.click(function () {
</div>
@stop
@section('js')
    <script>
        $(document).ready( () => {
            $('.btnAdd').click(function () {
                var proId = $(this).attr('proId')
                var url = '{{url('/')}}'+'/produtos/getinfo/'+proId 
                $.ajax({
                type: "GET",
                url: url,
                success: function(result){
                    $('#vit_qtd').attr('max', result.pes_qtd_disponivel);
                    $('#desconto').attr('max', result.pro_max_desconto);

                    $('#nome').text(result.pro_nome);
                    $('#valor').text(result.pro_valor);
                    $('#disponivel').text(result.pes_qtd_disponivel);
                    $('#reservado').text(result.pes_qtd_reservada);
                    $('#maxDesconto').text(result.pro_max_desconto);
                    
                    $('#vit_pro_id').val(result.pro_id);
                    $('#modal').modal('show');
                },
                error: function(result){
                    $("#nestable-output").html('');
                    toastr.error("Erro ao buscar dados do produto", 'Ooops!')
                },
                beforeSend: function(){
                    $('#panel-load').addClass('.ld-loading');
                },
                complete: function(msg){
                    $('#panel-load').removeClass('.ld-loading');
                }
                });
            })

            $('#salvarItem').click(function () {
                var data = $('#form').serializeArray();
                var url = "{{url('/produtos/additem')}}"

                var qtd = parseInt($('#vit_qtd').val());
                var desconto = parseInt($('#desconto').val());
                
                if(qtd == "" || desconto == ""){
                    toastr.error("Preencha todos os campos", 'Ooops!')
                    return;
                }
                if(qtd > parseInt($("#disponivel").text())){
                    toastr.error("Quantidade maior que a quantidade disponivel", 'Ooops!')
                    return;
                }
                if(desconto > parseInt($("#maxDesconto").text())){
                    toastr.error("Desconto maior que o desconto permitido", 'Ooops!')
                    return;
                }

                $.ajax({
                    type: "POST",
                    data:data,
                    url: url,
                    success: function(result){
                        $('#modal').modal('hide');
                        toastr.success("Item adicionado", 'Sucesso!')
                        setTimeout(function(){ location.reload(); }, 1000);
                    },
                    error: function(result){
                        $("#nestable-output").html('');
                        toastr.error("Erro ao adicionar produto", 'Ooops!')
                    }
                });
            });
        })
    </script>
@stop