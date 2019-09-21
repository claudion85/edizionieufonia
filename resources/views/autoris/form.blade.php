<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
    <label for="nome" class="col-md-2 control-label">Nome</label>
    <div class="col-md-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ old('nome', optional($autori)->nome) }}" minlength="1" maxlength="45" required="true" placeholder="Enter nome here...">
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cognome') ? 'has-error' : '' }}">
    <label for="cognome" class="col-md-2 control-label">Cognome</label>
    <div class="col-md-10">
        <input class="form-control" name="cognome" type="text" id="cognome" value="{{ old('cognome', optional($autori)->cognome) }}" minlength="1" maxlength="45" required="true" placeholder="Enter cognome here...">
        {!! $errors->first('cognome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descrizione') ? 'has-error' : '' }}">
    <label for="descrizione" class="col-md-2 control-label">Descrizione</label>
    <div class="col-md-10">
        <textarea class="form-control" name="descrizione" cols="50" rows="10" id="descrizione" placeholder="Enter descrizione here...">{{ old('descrizione', optional($autori)->descrizione) }}</textarea>
        {!! $errors->first('descrizione', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('url_cv') ? 'has-error' : '' }}">
    <label for="url_cv" class="col-md-2 control-label">Url Cv</label>
    <div class="col-md-10">
        <input type="file" class="form-control" name="url_cv" cols="50" rows="10" id="url_cv" placeholder="Enter url cv here..."></input>
        {!! $errors->first('url_cv', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <label for="foto" class="col-md-2 control-label">Foto</label>
    
       <div class="col-md-10">
        <input class="form-control" name="foto" type="file" id="foto" value="{{ old('foto', optional($autori)->foto) }}" maxlength="100" placeholder="Enter foto here..." accept="image/*">
        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
    
    
</div>
<div class="form-group {{ $errors->has('url_pagina_personale') ? 'has-error' : '' }}">
    <label for="url_pagina_personale" class="col-md-2 control-label">Url Pagina Personale</label>
    <div class="col-md-10">
        <input class="form-control" name="url_pagina_personale" type="text" id="url_pagina_personale" value="{{ old('pagina_personale', optional($autori)->url_pagina_personale) }}"  placeholder="Enter url here...">
        {!! $errors->first('url_pagina_personale', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percentuale') ? 'has-error' : '' }}">
    <label for="percentuale" class="col-md-2 control-label">Percentuale</label>
    <div class="col-md-10">
        <input class="form-control" name="percentuale" type="number" id="percentuale" value="{{ old('percentuale', optional($autori)->percentuale) }}" min="0" max="100" placeholder="Enter percentuale here...">
        {!! $errors->first('percentuale', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('casa_editrice') ? 'has-error' : '' }}">
    <label for="casa_editrice" class="col-md-2 control-label">Casa Editrice</label>
    <div class="col-md-10">
        <select class="form-control" id="casa_editrice" name="casa_editrice">
        	    <option value="" style="display: none;" {{ old('casa_editrice', optional($autori)->casa_editrice ?: '') == '' ? 'selected' : '' }} disabled selected>Enter casa editrice here...</option>
        	@foreach ($CasaEditrices as $key => $CasaEditrice)
			    <option value="{{ $CasaEditrice }}" {{ old('casa_editrice', optional($autori)->casa_editrice) == $key ? 'selected' : '' }}>
			    	{{ $key }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('casa_editrice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

