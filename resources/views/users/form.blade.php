

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
    <label for="avatar" class="col-md-2 control-label">Avatar</label>
    <div class="col-md-10">
        <input class="form-control" name="avatar" type="text" id="avatar" value="{{ old('avatar', optional($user)->avatar) }}" maxlength="255">
        {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" minlength="1" maxlength="255" required="true" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('settings') ? 'has-error' : '' }}">
    <label for="settings" class="col-md-2 control-label">Settings</label>
    <div class="col-md-10">
        <textarea class="form-control" name="settings" cols="50" rows="10" id="settings" placeholder="Enter settings here...">{{ old('settings', optional($user)->settings) }}</textarea>
        {!! $errors->first('settings', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('isVendor') ? 'has-error' : '' }}">
    <label for="isVendor" class="col-md-2 control-label">Is Vendor</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="isVendor_1">
            	<input id="isVendor_1" class="" name="isVendor" type="checkbox" value="1" {{ old('isVendor', optional($user)->isVendor) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('isVendor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('isCustomer') ? 'has-error' : '' }}">
    <label for="isCustomer" class="col-md-2 control-label">Is Customer</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="isCustomer_1">
            	<input id="isCustomer_1" class="" name="isCustomer" type="checkbox" value="1" {{ old('isCustomer', optional($user)->isCustomer) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('isCustomer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('isAdmin') ? 'has-error' : '' }}">
    <label for="isAdmin" class="col-md-2 control-label">Is Admin</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="isAdmin_1">
            	<input id="isAdmin_1" class="" name="isAdmin" type="checkbox" value="1" {{ old('isAdmin', optional($user)->isAdmin) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('isAdmin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

