
<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
    <label for="nome" class="col-md-2 control-label">Nome</label>
    <div class="col-md-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ old('nome', optional($categorie)->nome) }}" minlength="1" maxlength="45" required="true" placeholder="Enter nome here...">
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descrizione') ? 'has-error' : '' }}">
    <label for="descrizione" class="col-md-2 control-label">Descrizione</label>
    <div class="col-md-10">
        <textarea class="form-control" name="descrizione" cols="50" rows="10" id="descrizione" required="true" placeholder="Enter descrizione here...">{{ old('descrizione', optional($categorie)->descrizione) }}</textarea>
        {!! $errors->first('descrizione', '<p class="help-block">:message</p>') !!}
    </div>
</div>

