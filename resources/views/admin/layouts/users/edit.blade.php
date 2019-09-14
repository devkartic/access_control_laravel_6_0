<div class="col-12">
    <form method="POST" action="{{ url('users/'.$user->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="user_name" class="col-md-3 col-form-label text-md-right">Name</label>
            <div class="col-md-7">
                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ $user->user_name }}" required autocomplete="user_name" autofocus>

                @error('user_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="role_id" class="col-md-3 col-form-label text-md-right">Role</label>
            <div class="col-md-7">
                <select id="role_id" type="text" class="form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                    <option value="">Select One</option>
                    @foreach($roles as $role)
                        <option @if($user->role_id==$role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
            <div class="col-md-7">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
            <div class="col-md-7">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="email" autofocus>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-md-3 col-form-label text-md-right">Re-type Password</label>
            <div class="col-md-7">
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="email" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-7 offset-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" checked>
                    <label class="form-check-label" for="remember">
                        Is Active
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>

</div>
