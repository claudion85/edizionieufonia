@extends('layouts.master')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
        <link href="https://rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">
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
                <h4 class="mt-5 mb-5">Spartito Libros</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('spartito_libros.spartito_libro.create') }}" class="btn btn-success" title="Create New Spartito Libro">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($spartitoLibros) == 0)
            <div class="panel-body text-center">
                <h4>No Spartito Libros Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Codice Interno</th>
                            <th>Nome</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($spartitoLibros as $spartitoLibro)
                        <tr>
                            <td>{{ $spartitoLibro->codice_interno }}</td>
                            <td>{{ $spartitoLibro->nome }}</td>

                            <td>

                                <form method="POST" action="{!! route('spartito_libros.spartito_libro.destroy', $spartitoLibro->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('spartito_libros.spartito_libro.show', $spartitoLibro->id ) }}" class="btn btn-info" title="Show Spartito Libro">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('spartito_libros.spartito_libro.edit', $spartitoLibro->id ) }}" class="btn btn-primary" title="Edit Spartito Libro">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Spartito Libro" onclick="return confirm(&quot;Click Ok to delete Spartito Libro.&quot;)">
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
            {!! $spartitoLibros->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection

    