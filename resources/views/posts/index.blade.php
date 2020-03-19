@extends('common.master')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Nieuws</p>
                <p class="subtitle is-3">Het laatste nieuws over de HZ</p>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">

                        <div class="has-text-right">
                            <a href="/posts/create" class="button is-primary">Nieuw artikel toevoegen...</a>
                        </div>

                        @foreach($posts as $post)
                            <div class="column is-12">
                                <div class="card">

                                    <div class="card-image">
                                        <img src="{{$post->img_url}}" alt="Post picture">
                                    </div>

                                    <div class="card-content">
                                        <div class="content">

                                            <a class="title is-12" href="/posts/{{$post->id}}">{{$post->title}}</a>

                                            <p>{{$post->excerpt}}</p>
                                        </div>
                                        <div class="has-text-centered">
                                            <a href="/posts/{{$post->id}}" class="button is-primary">Lees meer...</a>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <p class="card-footer-item">Gepubliceerd op: {{ $post->published_at }}</p>
                                    </footer>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
    </section>
@endsection
