@extends('common.page')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8-desktop is-12-tablet">

                    <div class="content">
                        <h1>{{ __('Reset Password') }}</h1>
                        @include('common.notifications')
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="field">
                                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="email" name="email" placeholder="{{ __('e.g. bobsmith@gmail.com') }}"
                                           class="input @error('email') is-danger @enderror"
                                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    @error('email')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @enderror
                                </div>
                                @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="password" class="label">{{ __('Password') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="password" name="password"
                                           class="input @error('password') is-danger @enderror"
                                           value="{{ old('password') }}" required autocomplete="password" autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    @error('password')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @enderror
                                </div>
                                @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="password_confirmation" class="label">{{ __('Confirm Password') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="password" name="password_confirmation"
                                           class="input @error('password_confirmation') is-danger @enderror"
                                           value="{{ old('password_confirmation') }}" required
                                           autocomplete="password_confirmation">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    @error('password_confirmation')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @enderror
                                </div>
                                @error('password_confirmation')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <button type="submit" class="button is-success">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                </div>
            </div>
        </div>
    </div>
@endsection
