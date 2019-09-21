@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Attributi Prodotti' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('attributi_prodottis.attributi_prodotti.destroy', $attributiProdotti->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('attributi_prodottis.attributi_prodotti.index') }}" class="btn btn-primary" title="Show All Attributi Prodotti">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('attributi_prodottis.attributi_prodotti.create') }}" class="btn btn-success" title="Create New Attributi Prodotti">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('attributi_prodottis.attributi_prodotti.edit', $attributiProdotti->id ) }}" class="btn btn-primary" title="Edit Attributi Prodotti">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Attributi Prodotti" onclick="return confirm(&quot;Click Ok to delete Attributi Prodotti.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nome Attributo</dt>
            <dd>{{ $attributiProdotti->nome_attributo }}</dd>
            <dt>Valore</dt>
            <dd>{{ $attributiProdotti->valore }}</dd>
            <dt>Categoria</dt>
            <dd>{{ optional($attributiProdotti->Category)->nome }}</dd>
            <dt>Casaeditrice</dt>
            <dd>{{ optional($attributiProdotti->CasaEditrice)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $attributiProdotti->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $attributiProdotti->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection