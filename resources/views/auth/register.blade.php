@extends('common.master')

@section('body')
    <section class="hero is-primary is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-6-tablet is-5-desktop is-4-widescreen">
                        <div class="title">{{ __('Register') }}</div>
                        <form method="POST" action="{{ route('register') }}" class="box">
                            @csrf
                            <div class="field">
                                <label for="name" class="label">{{ __('auth.name') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="name" name="name" placeholder="e.g. John Doe"
                                           class="input @error('name') is-danger @enderror"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    @error('name')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @enderror
                                </div>
                                @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="lodging_name" class="label">{{ __('auth.lodging_name') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="text" name="lodging_name" placeholder="e.g. Tonhil hotel"
                                           class="input @error('lodging_name') is-danger @enderror"
                                           value="{{ old('lodging_name') }}" required autocomplete="lodging_name" autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-hotel"></i>
                                    </span>
                                    @error('lodging_name')
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @enderror
                                </div>
                                @error('lodging_name')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="email" class="label">{{ __('auth.email') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="email" name="email" placeholder="e.g. bobsmith@gmail.com"
                                           class="input @error('email') is-danger @enderror"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                    <input type="password" name="password" placeholder="*******"
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
                                    <input type="password" name="password_confirmation" placeholder="*****"
                                           class="input @error('password_confirmation') is-danger @enderror"
                                           value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation">
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
                                <button class="button is-success">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
