<form method="POST" action="/statuses">
    <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
        <header class="card-header">
            <p class="card-header-title"> {{-- The Card header content --}}
                {{ __('app.statuses.new') }}
            </p>
        </header>

        <div class="card-content">
            <div class="content">
                @csrf
                {{-- Here are all the form fields --}}
                <div class="field">
                    <label for="count" class="label">{{ __('app.statuses.count') }}</label>
                    <div class="control has-icons-left has-icons-right">
                        <input type="count" name="count" placeholder="{{ __('app.statuses.count_placeholder') }}"
                               class="input @error('count') is-danger @enderror"
                               value="{{ old('count') }}" required autocomplete="count" autofocus>
                        <span class="icon is-small is-left">
                            <i class="fas fa-bed"></i>
                        </span>
                        @error('count')
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        @enderror
                    </div>
                    @error('count')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="field is-grouped">
                {{-- Here are the form buttons: save, reset and cancel --}}
                <div class="control">
                    <button type="submit" class="button is-primary">{{ __('app.form.save') }}</button>
                </div>
                <div class="control">
                    <button type="reset" class="button is-warning">{{ __('app.form.reset') }}</button>
                </div>
                <div class="control">
                    <a type="button" href="/posts" class="button is-light">{{ __('app.form.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</form>
