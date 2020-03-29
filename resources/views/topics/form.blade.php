@csrf
<div class="field">
    <label class="label">Name</label>
    <fieldset class="control">
        <input type="text" class="input" name="title" placeholder="Enter topic's name" value="{{ $topic->title }}"
            required>
    </fieldset>

</div>
<div class="field">
    <label class="label">Color</label>
    <fieldset class="control">
        <input type="text" class="input" name="color" placeholder="Enter topic's color in hex format (#xxxxxx)" value="{{ $topic->color }}"
            required>
    </fieldset>

</div>
<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
