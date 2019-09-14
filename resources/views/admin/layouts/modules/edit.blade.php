<div class="col-12">
    <form method="POST" action="{{ url('modules/'.$module->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
            <div class="col-md-7">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $module->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="fa_icon" class="col-md-3 col-form-label text-md-right">Icon</label>
            <div class="col-md-7">
                <input id="fa_icon" type="text" class="form-control @error('fa_icon') is-invalid @enderror" name="fa_icon" value="{{ $module->fa_icon }}" required autocomplete="fa_icon" autofocus>

                @error('fa_icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="order_number" class="col-md-3 col-form-label text-md-right">Order Number</label>
            <div class="col-md-7">
                <input id="order_number" type="text" class="form-control @error('order_number') is-invalid @enderror" name="order_number" value="{{ $module->order_number }}" required autocomplete="order_number" autofocus>

                @error('order_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-7 offset-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status"  @if($module->status==1) checked @endif >
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
