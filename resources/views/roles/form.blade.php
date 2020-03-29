@csrf
<div class="field">
    <label class="label">Machine name</label>
    <fieldset class="control">
        <input type="text" class="input" name="name" placeholder="Enter role's machine name" value="{{ $role->name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Display name</label>
    <fieldset class="control">
        <input type="text" class="input" name="display_name" placeholder="Enter role's display name" value="{{ $role->display_name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Description</label>
    <fieldset class="control">
        <input type="text" class="input" name="description" placeholder="Enter role's description" value="{{ $role->description }}"
            required>
    </fieldset>
</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
