@csrf


<div class="columns">
    <div class="column is-one-quarter">
        <div class="field">
            <label class="label">Select topic</label>
            <fieldset class="select">
                <select name="topic_id" required>
                    <option value="">Choose a topic</option>
                    @foreach ($topics->all() as $topic)
                    <option value="{{ $topic->id }}" @if (($topic->id == $question->topic_id))
                        selected
                        @endif
                        >{{ $topic->title }}</option>
                    @endforeach
                </select>
            </fieldset>
        </div>

        <div class="field">
            <label class="label">Select set</label>
            <fieldset class="select">
                <select name="set_id">
                    <option value="">Choose a set</option>
                    @foreach ($sets->all() as $set)
                    <option value="{{ $set->id }}" @if (($set->id == $question->set_id))
                        selected
                        @endif
                        >{{  $set->title  }}</option>
                    @endforeach
                </select>
            </fieldset>
        </div>

    </div>
    <div class="column">
        <div class="field">
            <label class="label">Question</label>
            <fieldset class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Enter question's name" value="{{ $question->title }}"
                    required>
            </fieldset>

        </div>

        <div class="field">
            <label for="" class="label">Text</label>
            <fieldset class="control">
                <textarea name="text" id="" cols="30" rows="10" class="textarea">{{  $question->text  }}</textarea>
            </fieldset>
        </div>

        <div class="field">
            <label class="label">Answer</label>
            <fieldset class="control">
                <input type="text" class="input" name="answer" placeholder="Enter question's answer"
                    value="{{ $question->answer }}" required>
            </fieldset>

        </div>
    </div>
</div>



<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
