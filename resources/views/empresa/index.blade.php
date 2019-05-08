@extends('base')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-cloud-upload"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Aplicações</h3>
                    <small>Lista das aplicações</small>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-filled">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar por nome.." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="account" style="width: 100%">
                                    <option selected="">Situação</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            @if(count($empresas))
                @foreach($empresas as $item)
                    <div class="col-md-4">
                        <div class="panel panel-filled ">
                            <div class="panel-body">
                                <img alt="image" class="rounded image-lg" src="{{asset('/theme/images/a3.jpg')}}">
                                <h5 class="m-b-none"><a href="">{{$item->FS28A_EMAIL}}</a></h5>

                                <div class="m-b-xs c-white small">{{$item->FS28A_REGISTRO}}</div>
                                <p>
                                    {{$item->FS28A_DESCRICAO}}
                                </p>
                                <small><i class="fa fa-clock-o"></i> Criado em: {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->FS28A_DT)->format('d/m/Y')}}</small>
                                <div class="btn-group pull-right m-b-md">
                                    <a type="button" href="{{route('empresas.show', [$item->FS28A_ID],false)}}" class="btn btn-default btn-xs">Acessar</a>
                                    {!! Form::open(["url" => url('/') . "/empresas/$item->FS28A_ID", "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                                        <button type="submit" class="btn btn-default btn-xs">Gerar token</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="overflow-y: hidden;">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Geração de token</h4>
                    </div>
                    <div class="modal-body" style="padding-top: 5px;">
                        <h5 class="m-b-none text-center" style="padding: 15px"><a href=""> TOKEN</a></h5>
                        <h5 class="m-t-none" id="token" style="">{{$result}}</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            var message = '{{json_encode($result)}}'
            var result = JSON.parse(message.replace(/&quot;/g, '"'));
            if(result != '') {
                // $('#token').text(result);
                $('#myModal').modal('show');
            }
        })
    </script>
@stop