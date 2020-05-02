@if ($errors->any())
  <div class="message is-danger">
    <div class="message-header">
        <p>Hi ha errors al formulari</p>
        <button class="delete" aria-label="delete"></button>
      </div>
    <div class="message-body">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
    </div>

  </div>
@endif
