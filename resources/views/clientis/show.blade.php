@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Clienti' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clientis.clienti.destroy', $clienti->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clientis.clienti.index') }}" class="btn btn-primary" title="Show All Clienti">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clientis.clienti.create') }}" class="btn btn-success" title="Create New Clienti">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clientis.clienti.edit', $clienti->id ) }}" class="btn btn-primary" title="Edit Clienti">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Clienti" onclick="return confirm(&quot;Click Ok to delete Clienti.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($clienti->user)->id }}</dd>
            <dt>Nome</dt>
            <dd>{{ $clienti->nome }}</dd>
            <dt>Cognome</dt>
            <dd>{{ $clienti->cognome }}</dd>
            <dt>Email</dt>
            <dd>{{ $clienti->email }}</dd>
            <dt>Carta Credito</dt>
            <dd>{{ $clienti->carta_credito }}</dd>
            <dt>Citta</dt>
            <dd>{{ $clienti->citta }}</dd>
            <dt>Cap</dt>
            <dd>{{ $clienti->cap }}</dd>
            <dt>Indirizzo</dt>
            <dd>{{ $clienti->indirizzo }}</dd>
            <dt>Numero Civico</dt>
            <dd>{{ $clienti->numero_civico }}</dd>
            <dt>Telefono</dt>
            <dd>{{ $clienti->telefono }}</dd>
            <dt>Categorie Preferite</dt>
            <dd>{{ $clienti->categorie_preferite }}</dd>
            <dt>Created At</dt>
            <dd>{{ $clienti->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $clienti->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
