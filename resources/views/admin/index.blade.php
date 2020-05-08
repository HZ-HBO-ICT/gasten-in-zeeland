@extends('common.page')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body" style="
            background: url('/img/20200430_133650.png') no-repeat center bottom;
            background-size: cover;"
        ></div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-offset-3-desktop is-6-desktop is-12-tablet">

                    <div class="content">
                        <h1>Welkom op de admin van Gasten in Zeeland.</h1>
                        @include('common.notifications')
                        <div class="box">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fas fa-table fa-4x"></i>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        Er zijn {{ $status_count }} registraties.
                                    </div>
                                    <nav class="level is-mobile">
                                        <div class="level-right">
                                            <a class="level-item" href="{{ route('admin.statuses') }}">Download .csv</a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fas fa-user-check fa-4x"></i>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        Er zijn {{ $verified_user_count }} geverifieerde gebruikers.
                                    </div>
                                    <nav class="level is-mobile">
                                        <div class="level-right">
                                            <a class="level-item" href="{{ route('admin.verified_users') }}">Beheer gebruikers</a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fas fa-user-shield fa-4x"></i>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        Er zijn {{ $unverified_user_count }} ongeverifieerde gebruikers.
                                    </div>
                                    <nav class="level is-mobile">
                                        <div class="level-right">
                                            <a class="level-item" href="{{ route('admin.unverified_users') }}">Verwijder</a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
