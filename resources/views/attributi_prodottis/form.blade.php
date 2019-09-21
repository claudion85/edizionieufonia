
<div class="form-group {{ $errors->has('nome_attributo') ? 'has-error' : '' }}">
    <label for="nome_attributo" class="col-md-2 control-label">Nome Attributo</label>
    <div class="col-md-10">
        <input class="form-control" name="nome_attributo" type="text" id="nome_attributo" value="{{ old('nome_attributo', optional($attributiProdotti)->nome_attributo) }}" maxlength="45" placeholder="Enter nome attributo here...">
        {!! $errors->first('nome_attributo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('valore') ? 'has-error' : '' }}">
    <label for="valore" class="col-md-2 control-label">Valore</label>
    <div class="col-md-10">
        <input class="form-control" name="valore"  id="valore" placeholder="Enter valore here..." data-role="tagsinput" value="{{ old('valore', optional($attributiProdotti)->valore) }} null"/>
        <small id="valueHelp" class="form-text text-muted">Per i numeri decimali utilizza la notazione puntata. es ( 2.5 ).</small>
        {!! $errors->first('valore', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
    <label for="categoria" class="col-md-2 control-label">Categoria</label>
    <div class="col-md-10">
        <select class="form-control" id="categoria" name="categoria" required="true">
        	    <option value="" style="display: none;" {{ old('categoria', optional($attributiProdotti)->categoria ?: '') == '' ? 'selected' : '' }} disabled selected>Enter categoria here...</option>
        	@foreach ($Categories as $key => $Category)
			    <option value="{{ $key }}" {{ old('categoria', optional($attributiProdotti)->categoria) == $key ? 'selected' : '' }}>
			    	{{ $Category }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('casaeditrice') ? 'has-error' : '' }}">
    <label for="casaeditrice" class="col-md-2 control-label">Casaeditrice</label>
    <div class="col-md-10">
        <select class="form-control" id="casaeditrice" name="casaeditrice">
        	    <option value="" style="display: none;" {{ old('casaeditrice', optional($attributiProdotti)->casaeditrice ?: '') == '' ? 'selected' : '' }} disabled selected>Enter casaeditrice here...</option>
        	@foreach ($CasaEditrices as $key => $CasaEditrice)
			    <option value="{{ $CasaEditrice }}" {{ old('casaeditrice', optional($attributiProdotti)->casaeditrice) == $CasaEditrice ? 'selected' : '' }}>
			    	{{ $key }}
			    </option>
			@endforeach
        </select>
        <small id="catHelp" class="form-text text-muted">Lascia vuoto se vuoi impostare il l'attributo per tutte le case editrici</small>

        {!! $errors->first('casaeditrice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

