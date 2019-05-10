<div class="col-md-12">
    <div class="panel panel-filled panel-c-accent">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                <a class="panel-close"><i class="fa fa-times"></i></a>
            </div>
            Formulário
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-10 @if ($errors->has('vnd_ven_id')) has-error @endif">
                    {!! Form::label('vnd_ven_id', 'Vendedor*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::select('vnd_ven_id',$vendedores, old('vnd_ven_id'), ['class' => 'form-control', 'placeholder'=> 'Selecione']) !!}
                        @if ($errors->has('vnd_ven_id')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-2">
                    {!! Form::label('vnd_ven_id', 'Criado em:', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('criado', \Carbon\Carbon::now()->format('d/m/Y'),  ['class' => 'form-control', 'disabled'=> 'true']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <button type="submit" class="btn btn-w-md btn-success"> Salvar e continuar </button>
            </div>
        </div>
    </div>
</div>