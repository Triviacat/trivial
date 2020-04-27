@csrf
<div class="field">
    <label class="label">@lang('trivial.machineName')</label>
    <fieldset class="control">
        <input type="text" class="input" name="name" placeholder="@lang('trivial.machineNameDescription')" value="{{ $permission->name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">@lang('trivial.displayName')</label>
    <fieldset class="control">
        <input type="text" class="input" name="display_name" value="{{ $permission->display_name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">@lang('trivial.description')</label>
    <fieldset class="control">
        <input type="text" class="input" name="description" value="{{ $permission->description }}"
            required>
    </fieldset>
</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">{{ $buttonText }}</button>
    </div>
    @include('includes.cancel')
</div>
