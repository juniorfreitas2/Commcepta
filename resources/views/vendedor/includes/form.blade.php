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
                <div class="form-group col-md-7 @if ($errors->has('ven_nome')) has-error @endif">
                    {!! Form::label('ven_nome', 'Nome*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('ven_nome', old('ven_nome'), ['class' => 'form-control']) !!}
                        @if ($errors->has('ven_nome')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-3 @if ($errors->has('ven_email')) has-error @endif">
                    {!! Form::label('ven_email', 'Email', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::email('ven_email', old('ven_email'), ['class' => 'form-control']) !!}
                        @if ($errors->has('ven_email')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-2 @if ($errors->has('ven_sexo')) has-error @endif">
                    {!! Form::label('ven_sexo', 'Sexo*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::select('ven_sexo',['M'=> 'Masculino', 'F'=> 'Feminino'],old('ven_sexo'), ['class' => 'form-control', 'placeholder'=> 'Selecione']) !!}
                        @if ($errors->has('ven_sexo')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3 @if ($errors->has('ven_cpf')) has-error @endif">
                    {!! Form::label('ven_cpf', 'CPF*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('ven_cpf', old('ven_cpf'), ['class' => 'form-control', 'placeholder'=>'999.999.999-99']) !!}
                        @if ($errors->has('ven_cpf')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-3 @if ($errors->has('ven_celular')) has-error @endif">
                    {!! Form::label('ven_celular', 'Celular', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('ven_celular', old('ven_celular'), ['class' => 'form-control', 'placeholder'=>'(99) 99999-9999']) !!}
                        @if ($errors->has('ven_celular')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-3 @if ($errors->has('ven_nascimento')) has-error @endif">
                    {!! Form::label('ven_nascimento', 'Dt. Nascimento*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::date('ven_nascimento', old('ven_nascimento'), ['class' => 'form-control']) !!}
                        @if ($errors->has('ven_nascimento')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>

                <div class="form-group col-md-3 @if ($errors->has('ven_ativo')) has-error @endif">
                    {!! Form::label('ven_ativo', 'Status*', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::select('ven_ativo',['1'=> 'Ativo', '0' => 'Cancelado'], old('ven_ativo'), ['class' => 'form-control', 'placeholder'=>'Selecione']) !!}
                        @if ($errors->has('ven_ativo')) <p class="help-block">Campo Obrigatório</p> @endif
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 @if ($errors->has('ven_observacao')) has-error @endif">
                {!! Form::label('ven_observacao', 'Observação', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::textArea('ven_observacao', old('ven_observacao'), ['class' => 'form-control', 'rows'=> '3']) !!}
                    @if ($errors->has('ven_observacao')) <p class="help-block">Campo Obrigatório</p> @endif
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