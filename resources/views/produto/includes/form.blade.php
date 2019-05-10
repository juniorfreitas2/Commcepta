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
                <div class="form-group col-md-7 @if ($errors->has('pro_nome')) has-error @endif">
                    {!! Form::label('pro_nome', 'Nome*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('pro_nome', old('pro_nome'), ['class' => 'form-control']) !!}
                        @if ($errors->has('pro_nome')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-3 @if ($errors->has('pro_valor')) has-error @endif">
                    {!! Form::label('pro_valor', 'Valor*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('pro_valor', old('pro_valor'), ['class' => 'form-control', 'id'=>'pro_valor']) !!}
                        @if ($errors->has('pro_valor')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-2 @if ($errors->has('pro_max_desconto')) has-error @endif">
                    {!! Form::label('pro_max_desconto', 'Max. desconto*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('pro_max_desconto',old('pro_max_desconto'), ['class' => 'form-control', 'id'=>'pro_desconto']) !!}
                        @if ($errors->has('pro_max_desconto')) <p class="help-block">Campo Obrigatório</p> @endif
                        <small>Valor em porcentagem</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <div class="text-right">
                <button type="submit" class="btn btn-w-md btn-success"> Salvar</button>
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script src="{{ asset('js/maskmoney.js') }}"></script>
    <script>
        $(function () {
            $('#pro_valor').maskMoney({
                prefix: 'R$ ',
                decimal:",", 
                thousands:"."
            });
            $('#pro_desconto').maskMoney({
                suffix: '% ',
                precision:0
            });
        });
    </script>
@stop