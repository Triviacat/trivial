@csrf
<div class="field">
    <label class="label">Name</label>
    <fieldset class="control">
        <input type="text" class="input" name="title" placeholder="Enter set's name" value="{{ $set->title }}"
            required>
    </fieldset>

</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
