@csrf
<div class="field">
    <label class="label">Machine name</label>
    <fieldset class="control">
        <input type="text" class="input" name="name" placeholder="Enter permission's machine name" value="{{ $permission->name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Display name</label>
    <fieldset class="control">
        <input type="text" class="input" name="display_name" placeholder="Enter permission's display name" value="{{ $permission->display_name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Description</label>
    <fieldset class="control">
        <input type="text" class="input" name="description" placeholder="Enter permission's description" value="{{ $permission->description }}"
            required>
    </fieldset>
</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
