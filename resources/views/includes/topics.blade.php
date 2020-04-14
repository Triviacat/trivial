<div class="card">
    <div class="card-content tags">
        @foreach ($topics as $topic)
        <span style="background-color: {{ $topic->color}}; padding: 5px;" class="tag {{ $topic->id == 3 ? 'has-text-dark' : 'has-text-light' }} has-text-weight-bold">
            {{ $topic->title }}
        </span>
        @endforeach
</div>
</div>
