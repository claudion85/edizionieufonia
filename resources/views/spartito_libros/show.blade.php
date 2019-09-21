@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Spartito Libro' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('spartito_libros.spartito_libro.destroy', $spartitoLibro->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('spartito_libros.spartito_libro.index') }}" class="btn btn-primary" title="Show All Spartito Libro">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('spartito_libros.spartito_libro.create') }}" class="btn btn-success" title="Create New Spartito Libro">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('spartito_libros.spartito_libro.edit', $spartitoLibro->id ) }}" class="btn btn-primary" title="Edit Spartito Libro">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Spartito Libro" onclick="return confirm(&quot;Click Ok to delete Spartito Libro.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Codice Interno</dt>
            <dd>{{ $spartitoLibro->codice_interno }}</dd>
            <dt>Nome</dt>
            <dd>{{ $spartitoLibro->nome }}</dd>
            <dt>Descrizione</dt>
            <dd>{{ $spartitoLibro->descrizione }}</dd>
            <dt>Pdf Anteprima</dt>
            <dd>{{ $spartitoLibro->pdf_anteprima }}</dd>
            <dt>Pdf Da Vendere</dt>
            <dd>{{ $spartitoLibro->pdf_da_vendere }}</dd>
            <dt>Foto</dt>
            <dd>{{ $spartitoLibro->foto }}</dd>
            <dt>Categoria</dt>
            <dd>{{ optional($spartitoLibro->Category)->nome }}</dd>
            <dt>Ranking</dt>
            <dd>{{ $spartitoLibro->ranking }}</dd>
            <dt>Autore</dt>
            <dd>{{ optional($spartitoLibro->Autori)->nome }}</dd>
            <dt>Casa Editrice</dt>
            <dd>{{ optional($spartitoLibro->CasaEditrice)->id }}</dd>
            <dt>Durata</dt>
            <dd>{{ $spartitoLibro->durata }}</dd>
            <dt>Pagine</dt>
            <dd>{{ $spartitoLibro->pagine }}</dd>
            <dt>Audio</dt>
            <dd>{{ $spartitoLibro->audio }}</dd>
            <dt>Versione</dt>
            <dd>{{ $spartitoLibro->versione }}</dd>
            <dt>Quantita</dt>
            <dd>{{ $spartitoLibro->quantita }}</dd>
            <dt>Prezzo Cartaceo</dt>
            <dd>{{ $spartitoLibro->prezzo_cartaceo }}</dd>
            <dt>Prezzo Multimediale</dt>
            <dd>{{ $spartitoLibro->prezzo_multimediale }}</dd>
            <dt>Created At</dt>
            <dd>{{ $spartitoLibro->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $spartitoLibro->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection