@extends('common.page')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body" style="
            background: url('https://www.hz.nl/imager/uploads/images/3.-Werk-en-studie/Headers/docent-coacht-studenten-003_c8fa470484be7b69be5daae77a1602c5.jpg') no-repeat center center;
            background-size: cover;"
        ></div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8-desktop is-12-tablet">

                    <div class="content">
                        <h1>Welkom op de website van Gasten in Zeeland.</h1>
                        @if(Auth::user()->can_add_new_status)
                            @include('statuses.create_form')
                        @else
                            <div class="notification is-warning">
                                <button class="delete"></button>
                                {{ __('app.timeout_not_reached') }}
                            </div>
                        @endif
                        <h2></h2>
                        @if(Auth::user()->statuses()->count() > 0)
                            @include('statuses.index_table', ['statuses' => Auth::user()->statuses])
                        @endif
                    </div>
                </div>

                <div class="column is-4-desktop is-12-tablet">
                    <p class="title is-4">Nieuw(s) Online</p>

                    <div class="columns is-multiline">

                        @foreach($latestPosts as $post)
                            <div class="column is-12">
                                <div class="card">

                                    <div class="card-image">
                                        <img src="{{$post->img_url}}" alt="Post picture">
                                    </div>

                                    <div class="card-content">
                                        <div class="content">

                                            <a class="title is-4" href="/posts/{{$post->id}}">{{$post->title}}</a>

                                            <p>{{$post->excerpt}}</p>
                                        </div>
                                        <div class="has-text-centered">
                                            <a href="/posts/{{$post->id}}" class="button is-primary">Lees meer...</a>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <p class="card-footer-item">Gepubliceerd: {{ $post->published_at }}</p>
                                    </footer>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
