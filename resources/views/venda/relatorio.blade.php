@extends('base')
@section("content")

<div class="col-md-12">
    <form method="GET" action="{{ url('/relatorio') }}" id="formFiltros">
        <div class="row">
            <div class="col-md-4">
                {!! Form::label('date', 'Criado em:', ['class' => 'control-label']) !!}
                {!! Form::date('date', old('date'), ['class' => 'form-control', 'id'=>'date']) !!}
            </div>
                <div class="col-md-4">
                {!! Form::label('dateFim', 'Até:', ['class' => 'control-label']) !!}
                {!! Form::date('dateFim', old('dateFim'), ['class' => 'form-control', 'id'=>'dateFim']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                {!! Form::select('status', ['R'=> "Rascunho", "F"=> "Finalizado"], old('status'), ['class' => 'form-control', 'placeholder'=> 'Selecione', 'id'=>'tipo']) !!}
            </div>
            <div class="col-md-2" style="padding-top:24px">
                <input type="submit" class="form-control btn-default" value="Filtrar">
            </div>
        </div>
    </form>
</div>
<div class="row" style="margin:20px">
@if(count($data))
    <table class="table table-hover table-striped table-bordered table-sm table-responsive-sm" style="width:100%;text-align:left;overflow-x:auto">
        <tr>
            <th >Vendedor</th>
            <th >Status</th>
            <th >Qtd itens</th>
            <th >Total</th>
            <th >Data</th>
        </tr>

        @foreach($data as $item)
            <tr>
                <td>{{$item->vendedor->ven_nome}}</td>
                <td>{{$item->vnd_status == 'R' ? 'Rascunho' : "Finalizado"}}</td>
                <td>{{$item->vendaItem->count()}}</td>
                <td>R$: {{number_format($item->vendaItem->sum('vit_total_liquido') , 2, ',', '.')}}</td>
                <td>{{$item->created_at->format('d/m/Y')}}</td>
            </tr>
        @endforeach
    </table>
@else
    <h3 class="text-center">Nenhum registro encontrado</h3>
@endif

</div>    
@stop
@section('js')
<script type="text/javascript">
    
    $('#date').change(function(){
        $("#dateFim").attr('min', $('#date').val());
    })  
</script>
@stop