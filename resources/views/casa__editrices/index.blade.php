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
                <h4 class="mt-5 mb-5">Casa  Editrices</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('casa__editrices.casa__editrice.create') }}" class="btn btn-success" title="Create New Casa  Editrice">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($casaEditrices) == 0)
            <div class="panel-body text-center">
                <h4>No Casa  Editrices Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Nome</th>
                            <th>P Iva</th>
                            <th>Codice Fiscale</th>
                            <th>Indirizzo</th>
                            <th>Numero Telefono</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($casaEditrices as $casaEditrice)
                        <tr>
                            <td>{{ optional($casaEditrice->User)->id }}</td>
                            <td>{{ $casaEditrice->nome }}</td>
                            <td>{{ $casaEditrice->p_iva }}</td>
                            <td>{{ $casaEditrice->codice_fiscale }}</td>
                            <td>{{ $casaEditrice->indirizzo }}</td>
                            <td>{{ $casaEditrice->numero_telefono }}</td>

                            <td>

                                <form method="POST" action="{!! route('casa__editrices.casa__editrice.destroy', $casaEditrice->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('casa__editrices.casa__editrice.show', $casaEditrice->id ) }}" class="btn btn-info" title="Show Casa  Editrice">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('casa__editrices.casa__editrice.edit', $casaEditrice->id ) }}" class="btn btn-primary" title="Edit Casa  Editrice">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Casa  Editrice" onclick="return confirm(&quot;Click Ok to delete Casa  Editrice.&quot;)">
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
            {!! $casaEditrices->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
