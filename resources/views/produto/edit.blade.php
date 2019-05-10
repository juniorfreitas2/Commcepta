@extends('base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-user"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Cadastro de Produtos</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
    {!! Form::model($produto,["url" => url('/') . "/produtos/".$produto->pro_id, "method" => "PUT", "id" => "form", "role" => "form"]) !!}
        @include('produto.includes.form')
        {!!Form::hidden('pro_id',$produto->pro_id) !!}
    {!! Form::close() !!}
@stop