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
                <h4 class="mt-5 mb-5">Clientis</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('clientis.clienti.create') }}" class="btn btn-success" title="Create New Clienti">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($clientis) == 0)
            <div class="panel-body text-center">
                <h4>No Clientis Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Email</th>
                            <th>Carta Credito</th>
                            <th>Citta</th>
                            <th>Cap</th>
                            <th>Indirizzo</th>
                            <th>Numero Civico</th>
                            <th>Telefono</th>
                            <th>Categorie Preferite</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientis as $clienti)
                        <tr>
                            <td>{{ optional($clienti->user)->id }}</td>
                            <td>{{ $clienti->nome }}</td>
                            <td>{{ $clienti->cognome }}</td>
                            <td>{{ $clienti->email }}</td>
                            <td>{{ $clienti->carta_credito }}</td>
                            <td>{{ $clienti->citta }}</td>
                            <td>{{ $clienti->cap }}</td>
                            <td>{{ $clienti->indirizzo }}</td>
                            <td>{{ $clienti->numero_civico }}</td>
                            <td>{{ $clienti->telefono }}</td>
                            <td>{{ $clienti->categorie_preferite }}</td>

                            <td>

                                <form method="POST" action="{!! route('clientis.clienti.destroy', $clienti->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('clientis.clienti.show', $clienti->id ) }}" class="btn btn-info" title="Show Clienti">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('clientis.clienti.edit', $clienti->id ) }}" class="btn btn-primary" title="Edit Clienti">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Clienti" onclick="return confirm(&quot;Click Ok to delete Clienti.&quot;)">
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
            {!! $clientis->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
