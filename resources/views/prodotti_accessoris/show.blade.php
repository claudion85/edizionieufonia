@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Prodotti Accessori' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('prodotti_accessoris.prodotti_accessori.destroy', $prodottiAccessori->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('prodotti_accessoris.prodotti_accessori.index') }}" class="btn btn-primary" title="Show All Prodotti Accessori">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('prodotti_accessoris.prodotti_accessori.create') }}" class="btn btn-success" title="Create New Prodotti Accessori">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('prodotti_accessoris.prodotti_accessori.edit', $prodottiAccessori->id ) }}" class="btn btn-primary" title="Edit Prodotti Accessori">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Prodotti Accessori" onclick="return confirm(&quot;Click Ok to delete Prodotti Accessori.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nome</dt>
            <dd>{{ $prodottiAccessori->nome }}</dd>
            <dt>Prezzo</dt>
            <dd>{{ $prodottiAccessori->prezzo }}</dd>
            <dt>Descrizione</dt>
            <dd>{{ $prodottiAccessori->descrizione }}</dd>
            <dt>Codice</dt>
            <dd>{{ $prodottiAccessori->codice }}</dd>
            <dt>Immagine</dt>
            <dd>{{ $prodottiAccessori->immagine }}</dd>
            <dt>Pdf</dt>
            <dd>{{ $prodottiAccessori->pdf }}</dd>
            <dt>Casaeditrice</dt>
            <dd>{{ optional($prodottiAccessori->CasaEditrice)->id }}</dd>
            <dt>Attributi</dt>
            <dd>{{ $prodottiAccessori->attributi }}</dd>
            <dt>Categoria</dt>
            <dd>{{ optional($prodottiAccessori->Category)->nome }}</dd>
            <dt>Valutazione Media</dt>
            <dd>{{ $prodottiAccessori->valutazione_media }}</dd>
            <dt>Created At</dt>
            <dd>{{ $prodottiAccessori->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $prodottiAccessori->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection