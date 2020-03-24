@extends('common.page')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8-desktop is-12-tablet">

                    <div class="content">
                        <h1>{{ __('Reset Password') }}</h1>
                        @include('common.notifications')
                        @if (session('statuses'))
                            <div class="alert alert-success" role="alert">
                                {{ session('statuses') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="field">
                                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input type="email" name="email" placeholder="{{ __('e.g. bobsmith@gmail.com') }}"
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
                                <button type="submit" class="button is-success">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
