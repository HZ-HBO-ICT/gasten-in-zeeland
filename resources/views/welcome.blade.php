@extends('common.master')

@section('body')
    <section class="hero is-primary is-bold is-fullheight">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="/" class="navbar-item">
                            <strong><i class="fas fa-bed"></i> GiZ</strong>
                        </a>
                        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <span class="navbar-item">
                                <a class="button is-primary is-inverted" href="/login">
                                    {{ __('Login') }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
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
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            <nav class="tabs">
                <div class="container">
                    <ul>
                        <li><a href="https://www.csrhymes.com">Theme built by C.S. Rhymes</a>
                        </li>
                        <li><a href="https://github.com/dwaard">Adapted by BugSlayer</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
@endsection
