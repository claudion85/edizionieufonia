@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Casa  Editrice' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('casa__editrices.casa__editrice.destroy', $casaEditrice->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('casa__editrices.casa__editrice.index') }}" class="btn btn-primary" title="Show All Casa  Editrice">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('casa__editrices.casa__editrice.create') }}" class="btn btn-success" title="Create New Casa  Editrice">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('casa__editrices.casa__editrice.edit', $casaEditrice->id ) }}" class="btn btn-primary" title="Edit Casa  Editrice">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Casa  Editrice" onclick="return confirm(&quot;Click Ok to delete Casa  Editrice.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($casaEditrice->User)->id }}</dd>
            <dt>Nome</dt>
            <dd>{{ $casaEditrice->nome }}</dd>
            <dt>P Iva</dt>
            <dd>{{ $casaEditrice->p_iva }}</dd>
            <dt>Codice Fiscale</dt>
            <dd>{{ $casaEditrice->codice_fiscale }}</dd>
            <dt>Indirizzo</dt>
            <dd>{{ $casaEditrice->indirizzo }}</dd>
            <dt>Numero Telefono</dt>
            <dd>{{ $casaEditrice->numero_telefono }}</dd>
            <dt>Indirizzi Rivenditori</dt>
            <dd>{{ $casaEditrice->indirizzi_rivenditori }}</dd>
            <dt>Stripe  Api Key</dt>
            <dd>{{ $casaEditrice->stripe_ApiKey }}</dd>
            <dt>Paypal Client I D</dt>
            <dd>{{ $casaEditrice->paypal_clientID }}</dd>
            <dt>Paypal Secret I D</dt>
            <dd>{{ $casaEditrice->paypal_secretID }}</dd>
            <dt>Satispay Security Bearer</dt>
            <dd>{{ $casaEditrice->satispay_securityBearer }}</dd>
            <dt>Created At</dt>
            <dd>{{ $casaEditrice->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $casaEditrice->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection