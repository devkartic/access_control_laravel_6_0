<div class="col-12">
    <form method="POST" action="{{ url('roles/'.$role->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
            <div class="col-md-7">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-7 offset-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status"  @if($role->status==1) checked @endif  >
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
