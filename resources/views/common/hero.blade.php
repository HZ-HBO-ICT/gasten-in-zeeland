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
                        @hasSection('navbar-menu')
                        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                        @endif
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        @yield('navbar-menu')
                    </div>
                </div>
            </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-6-tablet is-5-desktop is-4-widescreen">
                        @include('common.notifications')
                    </div>
                </div>
                <div class="columns is-centered">
                    @yield('content')
                </div>
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
