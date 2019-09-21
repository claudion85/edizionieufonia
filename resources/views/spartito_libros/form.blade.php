
<div class="form-group {{ $errors->has('codice_interno') ? 'has-error' : '' }}">
    <label for="codice_interno" class="col-md-2 control-label">Codice Interno</label>
    <div class="col-md-10">
        <input class="form-control" name="codice_interno" type="text" id="codice_interno" value="{{ old('codice_interno', optional($spartitoLibro)->codice_interno) }}" maxlength="100" placeholder="Enter codice interno here...">
        {!! $errors->first('codice_interno', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
    <label for="nome" class="col-md-2 control-label">Nome</label>
    <div class="col-md-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ old('nome', optional($spartitoLibro)->nome) }}" minlength="1" maxlength="100" required="true" placeholder="Enter nome here...">
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descrizione') ? 'has-error' : '' }}">
    <label for="descrizione" class="col-md-2 control-label">Descrizione</label>
    <div class="col-md-10">
        <textarea class="form-control" name="descrizione" cols="50" rows="10" id="descrizione" required="true" placeholder="Enter descrizione here...">{{ old('descrizione', optional($spartitoLibro)->descrizione) }}</textarea>
        {!! $errors->first('descrizione', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pdf_anteprima') ? 'has-error' : '' }}">
    <label for="pdf_anteprima" class="col-md-2 control-label">Pdf Anteprima</label>
    <div class="col-md-10">
        <input class="form-control" name="pdf_anteprima" type="file" id="pdf_anteprima" value="{{ old('pdf_anteprima', optional($spartitoLibro)->pdf_anteprima) }}" minlength="1" maxlength="100"  placeholder="Enter pdf anteprima here...">
        {!! $errors->first('pdf_anteprima', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pdf_da_vendere') ? 'has-error' : '' }}">
    <label for="pdf_da_vendere" class="col-md-2 control-label">Pdf Da Vendere</label>
    <div class="col-md-10">
        <input class="form-control" name="pdf_da_vendere" type="file" id="pdf_da_vendere" value="{{ old('pdf_da_vendere', optional($spartitoLibro)->pdf_da_vendere) }}" minlength="1" maxlength="100"  placeholder="Enter pdf da vendere here...">
        {!! $errors->first('pdf_da_vendere', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <label for="foto" class="col-md-2 control-label">Foto</label>
    <div class="col-md-10">
        <input class="form-control" name="foto" type="file" id="foto" value="{{ old('foto', optional($spartitoLibro)->foto) }}" minlength="1" maxlength="100"  placeholder="Enter foto here...">
        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
    <label for="categoria" class="col-md-2 control-label">Categoria</label>
    <div class="col-md-10">
        <select class="form-control" id="categoria" name="categoria" required="true">
        	    <option value="" style="display: none;" {{ old('categoria', optional($spartitoLibro)->categoria ?: '') == '' ? 'selected' : '' }} disabled selected>Enter categoria here...</option>
        	@foreach ($Categories as $key => $Category)
			    <option value="{{ $key }}" {{ old('categoria', optional($spartitoLibro)->categoria) == $key ? 'selected' : '' }}>
			    	{{ $Category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ranking') ? 'has-error' : '' }}">
    <label for="ranking" class="col-md-2 control-label">Ranking</label>
    <div class="col-md-10">
        <input class="form-control" name="ranking" type="number" id="ranking" value="{{ old('ranking', optional($spartitoLibro)->ranking) }}" min="-2147483648" max="2147483647" placeholder="Enter ranking here...">
        {!! $errors->first('ranking', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('autore[]') ? 'has-error' : '' }}">
    <label for="autore" class="col-md-2 control-label">Autore</label>
    <div class="col-md-10">
        <select multiple class=" js-example-basic-multiple" id="autore" name="autore[]" >
                
               <!-- <option value="" style="display: none;" {{ old('autore', optional($spartitoLibro)->autore ?: '') == '' ? 'selected' : '' }} disabled selected>Enter autore here...</option>-->
                <option value="" style="display: none;" {{ old('autore[]', optional($spartitoLibro)->autore ?: '') == '' ? 'selected' : '' }}  >Nessuno</option>
          
          
          
            @foreach ($Autoris as $key => $Autori)
                
			    <option value="{{ $key }}" {{old('autore[]', optional($spartitoLibro)->autore) == $key ? 'selected' : '' }}>
			    	{{ $Autori }}
                </option>

			@endforeach
        </select>
        
        {!! $errors->first('autore', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('altro[]') ? 'has-error' : '' }}">
    <label for="altro" class="col-md-2 control-label">Altro</label>
    <div class="col-md-10">
      <input class="form-control" name="altro" data-role="tagsinput" id="altro" required="true" placeholder="Enter other info  here..." value="{{ old('altro', optional($spartitoLibro)->altro) }}" style="width:100%">

        
        {!! $errors->first('altro', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('casa_editrice') ? 'has-error' : '' }}">
    <label for="casa_editrice" class="col-md-2 control-label">Casa Editrice</label>
    <div class="col-md-10">
        <select class="form-control" id="casa_editrice" name="casa_editrice" required="true">
        	    <option value="" style="display: none;" {{ old('casa_editrice', optional($spartitoLibro)->casa_editrice ?: '') == '' ? 'selected' : '' }} disabled selected>Enter casa editrice here...</option>
        	@foreach ($CasaEditrices as $key => $CasaEditrice)
			    <option value="{{ $CasaEditrice }}" {{ old('casa_editrice', optional($spartitoLibro)->casa_editrice) == $CasaEditrice ? 'selected' : '' }}>
			    	{{ $key }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('casa_editrice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('durata') ? 'has-error' : '' }}">
    <label for="durata" class="col-md-2 control-label">Durata</label>
    <div class="col-md-10">
        <input class="form-control" name="durata" type="number" id="durata" value="{{ old('durata', optional($spartitoLibro)->durata) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter durata here...">
        {!! $errors->first('durata', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pagine') ? 'has-error' : '' }}">
    <label for="pagine" class="col-md-2 control-label">Pagine</label>
    <div class="col-md-10">
        <input class="form-control" name="pagine" type="number" id="pagine" value="{{ old('pagine', optional($spartitoLibro)->pagine) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter pagine here...">
        {!! $errors->first('pagine', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('audio') ? 'has-error' : '' }}">
    <label for="audio" class="col-md-2 control-label">Audio</label>
    <div class="col-md-10">
        <input class="form-control" name="audio" type="text" id="audio" value="{{ old('audio', optional($spartitoLibro)->audio) }}" maxlength="45" placeholder="Enter audio here...">
        {!! $errors->first('audio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('versione') ? 'has-error' : '' }}">
    <label for="versione" class="col-md-2 control-label">Versione</label>
    <div class="col-md-10">
        <select class="form-control" id="versione" name="versione" required="true">
        	    <option value="" style="display: none;" {{ old('versione', optional($spartitoLibro)->versione ?: '') == '' ? 'selected' : '' }} disabled selected>Enter versione here...</option>
        	@foreach (['cartaceo' => 'Cartaceo',
'multimediale' => 'Multimediale',
'cartaceo e multimediale' => 'Cartaceo E Multimediale',
'' => ''] as $key => $text)
			    <option value="{{ $key }}" {{ old('versione', optional($spartitoLibro)->versione) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('versione', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantita') ? 'has-error' : '' }}">
    <label for="quantita" class="col-md-2 control-label">Quantita</label>
    <div class="col-md-10">
        <input class="form-control" name="quantita" type="number" id="quantita" value="{{ old('quantita', optional($spartitoLibro)->quantita) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter quantita here...">
        {!! $errors->first('quantita', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('peso') ? 'has-error' : '' }}">
    <label for="peso" class="col-md-2 control-label">Peso in Grammi.</label>
    <div class="col-md-10">
        <input class="form-control" name="peso" type="numeric" id="peso" value="{{ old('peso', optional($spartitoLibro)->peso) }}" min="0" max="900000"  placeholder="Enter peso here...">
        {!! $errors->first('peso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prezzo_cartaceo') ? 'has-error' : '' }}">
    <label for="prezzo_cartaceo" class="col-md-2 control-label">Prezzo Cartaceo</label>
    <div class="col-md-10">
        <input class="form-control" name="prezzo_cartaceo" type="number" id="prezzo_cartaceo" value="{{ old('prezzo_cartaceo', optional($spartitoLibro)->prezzo_cartaceo) }}" min="0" max="9000" required="true" placeholder="Enter prezzo cartaceo here...">
        {!! $errors->first('prezzo_cartaceo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prezzo_multimediale') ? 'has-error' : '' }}">
    <label for="prezzo_multimediale" class="col-md-2 control-label">Prezzo Multimediale</label>
    <div class="col-md-10">
        <input class="form-control" name="prezzo_multimediale" type="number" id="prezzo_multimediale" value="{{ old('prezzo_multimediale', optional($spartitoLibro)->prezzo_multimediale) }}" min="0" max="9000" required="true" placeholder="Enter prezzo multimediale here...">
        {!! $errors->first('prezzo_multimediale', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('prezzo_cartaceo_multimediale') ? 'has-error' : '' }}">
    <label for="prezzo_cartaceo_multimediale" class="col-md-2 control-label">Prezzo Cartaceo E Multimediale</label>
    <div class="col-md-10">
        <input class="form-control" name="prezzo_cartaceo_multimediale" type="number" id="prezzo_cartaceo_multimediale" value="{{ old('prezzo_cartaceo_multimediale', optional($spartitoLibro)->prezzo_cartaceo_multimediale) }}" min="0" max="900000" required="true" placeholder="Enter prezzo cartaceo e  multimediale here...">
        {!! $errors->first('prezzo_cartaceo_multimediale', '<p class="help-block">:message</p>') !!}
    </div>
</div>
