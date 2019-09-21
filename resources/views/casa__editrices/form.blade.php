
<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
    <label for="nome" class="col-md-2 control-label">Nome</label>
    <div class="col-md-10">
        <input class="form-control" name="nome" type="text" id="nome" value="{{ old('nome', optional($casaEditrice)->nome) }}" minlength="1" maxlength="45" required="true" placeholder="Enter nome here...">
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($casaEditrice)->email) }}" minlength="1" maxlength="45" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($casaEditrice)->password) }}" minlength="1" maxlength="45" required="true" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        <small id="passwordHelpBlock" class="form-text text-muted">
 Lascia Invariato se non vuoi cambiare password
</small>
    </div>
</div>

<div class="form-group {{ $errors->has('p_iva') ? 'has-error' : '' }}">
    <label for="p_iva" class="col-md-2 control-label">P Iva</label>
    <div class="col-md-10">
        <input class="form-control" name="p_iva" type="text" id="p_iva" value="{{ old('p_iva', optional($casaEditrice)->p_iva) }}" minlength="1" maxlength="45" required="true" placeholder="Enter p iva here...">
        {!! $errors->first('p_iva', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codice_fiscale') ? 'has-error' : '' }}">
    <label for="codice_fiscale" class="col-md-2 control-label">Codice Fiscale</label>
    <div class="col-md-10">
        <input class="form-control" name="codice_fiscale" type="text" id="codice_fiscale" value="{{ old('codice_fiscale', optional($casaEditrice)->codice_fiscale) }}" minlength="1" maxlength="45" required="true" placeholder="Enter codice fiscale here...">
        {!! $errors->first('codice_fiscale', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('indirizzo') ? 'has-error' : '' }}">
    <label for="indirizzo" class="col-md-2 control-label">Indirizzo</label>
    <div class="col-md-10">
        <input class="form-control" name="indirizzo" type="text" id="indirizzo" value="{{ old('indirizzo', optional($casaEditrice)->indirizzo) }}" minlength="1" maxlength="45" required="true" placeholder="Enter indirizzo here...">
        {!! $errors->first('indirizzo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numero_telefono') ? 'has-error' : '' }}">
    <label for="numero_telefono" class="col-md-2 control-label">Numero Telefono</label>
    <div class="col-md-10">
        <input class="form-control" name="numero_telefono" type="text" id="numero_telefono" value="{{ old('numero_telefono', optional($casaEditrice)->numero_telefono) }}" minlength="1" maxlength="12" required="true" placeholder="Enter numero telefono here...">
        {!! $errors->first('numero_telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('indirizzi_rivenditori') ? 'has-error' : '' }}">
    <label for="indirizzi_rivenditori" class="col-md-2 control-label">Indirizzi Rivenditori</label>
    <div class="col-md-10">
        <input class="form-control" name="indirizzi_rivenditori" data-role="tagsinput" id="indirizzi_rivenditori" required="true" placeholder="Enter indirizzi rivenditori here..." value="{{ old('indirizzi_rivenditori', optional($casaEditrice)->indirizzi_rivenditori) }}" style="width:100%">
        {!! $errors->first('indirizzi_rivenditori', '<p class="help-block">:message</p>') !!}
        <small id="passwordHelpBlock" class="form-text text-muted">
 In attesa delle Google Api Keys utilizza il campo soprastante usando il trattino ( - ) come separatore al posto della virgola es.( Via Roma 4 - Milano)
</small>
    </div>
</div>

<div class="form-group {{ $errors->has('stripe_ApiKey') ? 'has-error' : '' }}">
    <label for="stripe_ApiKey" class="col-md-2 control-label">Stripe  Api Key</label>
    <div class="col-md-10">
        <input class="form-control" name="stripe_ApiKey" type="text" id="stripe_ApiKey" value="{{ old('stripe_ApiKey', optional($casaEditrice)->stripe_ApiKey) }}" maxlength="45" placeholder="Enter stripe  api key here...">
        {!! $errors->first('stripe_ApiKey', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('paypal_clientID') ? 'has-error' : '' }}">
    <label for="paypal_clientID" class="col-md-2 control-label">Paypal Client I D</label>
    <div class="col-md-10">
        <input class="form-control" name="paypal_clientID" type="text" id="paypal_clientID" value="{{ old('paypal_clientID', optional($casaEditrice)->paypal_clientID) }}" maxlength="45" placeholder="Enter paypal client i d here...">
        {!! $errors->first('paypal_clientID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('paypal_secretID') ? 'has-error' : '' }}">
    <label for="paypal_secretID" class="col-md-2 control-label">Paypal Secret I D</label>
    <div class="col-md-10">
        <input class="form-control" name="paypal_secretID" type="text" id="paypal_secretID" value="{{ old('paypal_secretID', optional($casaEditrice)->paypal_secretID) }}" maxlength="45" placeholder="Enter paypal secret i d here...">
        {!! $errors->first('paypal_secretID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('satispay_securityBearer') ? 'has-error' : '' }}">
    <label for="satispay_securityBearer" class="col-md-2 control-label">Satispay Security Bearer</label>
    <div class="col-md-10">
        <input class="form-control" name="satispay_securityBearer" type="text" id="satispay_securityBearer" value="{{ old('satispay_securityBearer', optional($casaEditrice)->satispay_securityBearer) }}" maxlength="150" placeholder="Enter satispay security bearer here...">
        {!! $errors->first('satispay_securityBearer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

