@extends('base')

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-user"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Cadastro de Vendedores</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>
    {!! Form::model($vendedor,["url" => url('/') . "/vendedores/".$vendedor->ven_id, "method" => "PUT", "id" => "form", "role" => "form"]) !!}
        @include('vendedor.includes.form')
        {!!Form::hidden('ven_id',$vendedor->ven_id) !!}
    {!! Form::close() !!}
@stop