@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Autori' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('autoris.autori.destroy', $autori->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('autoris.autori.index') }}" class="btn btn-primary" title="Show All Autori">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('autoris.autori.create') }}" class="btn btn-success" title="Create New Autori">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('autoris.autori.edit', $autori->id ) }}" class="btn btn-primary" title="Edit Autori">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Autori" onclick="return confirm(&quot;Click Ok to delete Autori.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>


    <div class="col-xl-12 col-md-12">
                                <div class="card directory-card m-b-20">
                                    <div>
                                        <div class="directory-bg text-center">
                                            <div class="directory-overlay">
                                                <img class="rounded-circle thumb-lg img-thumbnail" src="/{{$autori->foto}}" alt="Generic placeholder image" style="width:188px;height: 188px;margin-bottom:5%;">
                                            </div>
                                        </div>
        
                                        <div class="directory-content text-center p-4">
                                            <p class="font-14 mt-4"></p>
                                            <h5 class="font-18">{{$autori->nome}} {{$autori->cognome}}</h5>
                                            <p class="text-muted">Descrizione : <b>{{$autori->descrizione}}</b></p>
                                            <p class="text-muted">Casa Editrice : <b>{{ optional($autori->CasaEditrice)->nome }}</b></p>
                                            <p class="text-muted">Percentuale : <b>{{ $autori->percentuale }}%</b></p>
                                            <p class="text-muted">
                                            Curriculum Vitae: <a title="" data-placement="top" class="" data-toggle="" class="" href="/{{$autori->url_cv}}" data-original-title=""><i class="far fa-file"></i></a>
                                            </p>
                                               
                                                
                                                   
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->








    
</div>

@endsection