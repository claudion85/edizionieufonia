@extends('layouts.master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Attributi Prodottis</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('attributi_prodottis.attributi_prodotti.create') }}" class="btn btn-success" title="Create New Attributi Prodotti">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($attributiProdottis) == 0)
            <div class="panel-body text-center">
                <h4>No Attributi Prodottis Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nome Attributo</th>
                            <th>Casa Editrice</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($attributiProdottis as $attributiProdotti)
                        <tr>
                            <td>{{ $attributiProdotti->nome_attributo }}</td>
                            <td>{{ $attributiProdotti->casaeditrice }}</td>

                            <td>

                                <form method="POST" action="{!! route('attributi_prodottis.attributi_prodotti.destroy', $attributiProdotti->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('attributi_prodottis.attributi_prodotti.show', $attributiProdotti->id ) }}" class="btn btn-info" title="Show Attributi Prodotti">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('attributi_prodottis.attributi_prodotti.edit', $attributiProdotti->id ) }}" class="btn btn-primary" title="Edit Attributi Prodotti">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Attributi Prodotti" onclick="return confirm(&quot;Click Ok to delete Attributi Prodotti.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $attributiProdottis->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection