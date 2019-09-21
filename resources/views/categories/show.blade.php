@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Categorie' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('categories.categorie.destroy', $categorie->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('categories.categorie.index') }}" class="btn btn-primary" title="Show All Categorie">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('categories.categorie.create') }}" class="btn btn-success" title="Create New Categorie">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('categories.categorie.edit', $categorie->id ) }}" class="btn btn-primary" title="Edit Categorie">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Categorie" onclick="return confirm(&quot;Click Ok to delete Categorie.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nome</dt>
            <dd>{{ $categorie->nome }}</dd>
            <dt>Descrizione</dt>
            <dd>{{ $categorie->descrizione }}</dd>

        </dl>

    </div>
</div>

@endsection