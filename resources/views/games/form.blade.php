@csrf
<div class="field">
    <label class="label">Machine name</label>
    <fieldset class="control">
        <input type="text" class="input" name="name" placeholder="Enter game's machine name" value="{{ $game->name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Display name</label>
    <fieldset class="control">
        <input type="text" class="input" name="display_name" placeholder="Enter game's display name" value="{{ $game->display_name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Description</label>
    <fieldset class="control">
        <input type="text" class="input" name="description" placeholder="Enter game's description" value="{{ $game->description }}"
            required>
    </fieldset>
</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
