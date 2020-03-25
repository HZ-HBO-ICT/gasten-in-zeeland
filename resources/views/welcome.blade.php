@extends('common.hero')

@section('navbar-menu')
    <div class="navbar-end">
        <span class="navbar-item">
            <a class="button is-primary is-inverted" href="/login">
                {{ __('Login') }}
            </a>
        </span>
    </div>
@endsection

@section('content')
    <div class="column is-6-tablet is-5-desktop is-4-widescreen has-text-centered">
    <h1 class="title">
        Gasten in Zeeland
    </h1>
    <h2 class="subtitle">
        Monitoren van aanwezige gasten in de provincie
    </h2>
    <a class="button is-success" href="/register">
        {{ __('Register') }}
    </a>
    </div>
@endsection
