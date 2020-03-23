@extends('common.page')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8-desktop is-12-tablet">

                    <div class="content">
                        <h1>{{ __('Verify Your Email Address') }}</h1>
                        @include('common.notifications')
                        @if (session('resent'))
                            <div class="notification is-success">
                                <button class="delete"></button>
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="button is-primary">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
