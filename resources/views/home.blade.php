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
                        <h1>Welkom op de website van Gasten in Zeeland.</h1>
                        @include('common.notifications')
                        @include('statuses.create_form')
                        <h2></h2>
                        @if(Auth::user()->statuses()->count() > 0)
                            @include('statuses.index_table', [
                                'statuses' => Auth::user()->statuses()->orderBy('measured_at', 'desc')->get()
                            ])
                        @endif
                    </div>
                </div>

                <!-- <div class="column is-4-desktop is-12-tablet">
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

                </div> -->
            </div>
        </div>
    </section>
@endsection
