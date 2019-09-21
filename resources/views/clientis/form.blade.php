

<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
    <label for="nome" class="col-md-2 control-label">Nome</label>
    <div class="col-md-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ old('nome', optional($clienti)->nome) }}" minlength="1" maxlength="45" required="true" placeholder="Enter nome here...">
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cognome') ? 'has-error' : '' }}">
    <label for="cognome" class="col-md-2 control-label">Cognome</label>
    <div class="col-md-10">
        <input class="form-control" name="cognome" type="text" id="cognome" value="{{ old('cognome', optional($clienti)->cognome) }}" minlength="1" maxlength="45" required="true" placeholder="Enter cognome here...">
        {!! $errors->first('cognome', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($clienti)->email) }}" minlength="1" maxlength="45" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($clienti)->password) }}" minlength="1" maxlength="45" required="true" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('carta_credito') ? 'has-error' : '' }}">
    <label for="carta_credito" class="col-md-2 control-label">Carta Credito</label>
    <div class="col-md-10">
        <input class="form-control" name="carta_credito" type="text" id="carta_credito" value="{{ old('carta_credito', optional($clienti)->carta_credito) }}" maxlength="45" placeholder="Enter carta credito here...">
        {!! $errors->first('carta_credito', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('citta') ? 'has-error' : '' }}">
    <label for="citta" class="col-md-2 control-label">Citta</label>
    <div class="col-md-10">
        <input class="form-control" name="citta" type="text" id="citta" value="{{ old('citta', optional($clienti)->citta) }}" maxlength="45" placeholder="Enter citta here...">
        {!! $errors->first('citta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cap') ? 'has-error' : '' }}">
    <label for="cap" class="col-md-2 control-label">Cap</label>
    <div class="col-md-10">
        <input class="form-control" name="cap" type="text" id="cap" value="{{ old('cap', optional($clienti)->cap) }}" maxlength="45" placeholder="Enter cap here...">
        {!! $errors->first('cap', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('indirizzo') ? 'has-error' : '' }}">
    <label for="indirizzo" class="col-md-2 control-label">Indirizzo</label>
    <div class="col-md-10">
        <input class="form-control" name="indirizzo" type="text" id="indirizzo" value="{{ old('indirizzo', optional($clienti)->indirizzo) }}" maxlength="45" placeholder="Enter indirizzo here...">
        {!! $errors->first('indirizzo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numero_civico') ? 'has-error' : '' }}">
    <label for="numero_civico" class="col-md-2 control-label">Numero Civico</label>
    <div class="col-md-10">
        <input class="form-control" name="numero_civico" type="number" id="numero_civico" value="{{ old('numero_civico', optional($clienti)->numero_civico) }}" min="-2147483648" max="2147483647" placeholder="Enter numero civico here...">
        {!! $errors->first('numero_civico', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
    <label for="telefono" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-10">
        <input class="form-control" name="telefono" type="text" id="telefono" value="{{ old('telefono', optional($clienti)->telefono) }}" maxlength="45" placeholder="Enter telefono here...">
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categorie_preferite') ? 'has-error' : '' }}">
    <label for="categorie_preferite" class="col-md-2 control-label">Categorie Preferite</label>
    <div class="col-md-10">
        <input class="form-control" name="categorie_preferite" type="text" id="categorie_preferite" value="{{ old('categorie_preferite', optional($clienti)->categorie_preferite) }}" maxlength="45" placeholder="Enter categorie preferite here...">
        {!! $errors->first('categorie_preferite', '<p class="help-block">:message</p>') !!}
    </div>
</div>

