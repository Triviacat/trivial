@csrf
<div class="field">
    <label class="label">Name</label>
    <fieldset class="control">
        <input type="text" class="input" name="title" placeholder="Enter user's name" value="{{ $user->name }}"
            required>
    </fieldset>
</div>

<div class="field">
    <label class="label">Assign roles</label>
    {{-- <fieldset class=""> --}}
        {{-- <select multiple name="role_id" > --}}
            @foreach ($roles->all() as $role)
            <div class="">
            <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if ($user->hasRole($role->name)) checked @endif>{{ $role->display_name }}
        </div>
            {{-- @dump($role) --}}
            {{-- <option value="{{ $role->id }}"
            @if (($role->id == $user->roles->id))
                selected
                @endif
                >{{ $role->display_name }}</option> --}}
            @endforeach
        {{-- </select> --}}
    {{-- </fieldset> --}}
</div>
{{-- @dump($user->permissions) --}}
<div class="field">
    <label class="label">Assign permissions</label>
    {{-- <fieldset class="select is-multiple">
        <select multiple name="permission_id"> --}}
            @foreach ($permissions->all() as $permission)
            <div class="">
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @if ($user->hasPermission($permission->name)) checked @endif>{{ $permission->display_name }}
            </div>
            {{-- @dump($permission) --}}
            {{-- <option value="{{ $permission->id }}" --}}
                {{-- @if (($permission->id == $user->permissions->id))
                selected
                @endif --}}
                {{-- >{{ $permission->display_name }}</option> --}}
            @endforeach
        {{-- </select>
    </fieldset> --}}
</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-info">Submit</button>
    </div>
    @include('includes.cancel')
</div>
