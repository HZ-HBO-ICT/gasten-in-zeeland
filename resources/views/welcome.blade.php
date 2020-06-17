@extends('common.hero')

@section('navbar-menu')
    <div class="navbar-end">
        <span class="navbar-item">
            <a class="button is-primary is-inverted" href="{{route('login')}}">
                {{ __('Login') }}
            </a>
        </span>
    </div>
@endsection

@section('content')
    <div class="column is-8-tablet is-7-desktop is-6-widescreen">
        <h1 class="title">
            Gasten in Zeeland
        </h1>
        <div class="notification is-danger">
            Beste ondernemer,<br/>
            Vanaf heden is registratie niet meer nodig! De gegevens van het registratiesysteem worden binnen drie weken
            (vanaf 17-6) verwijderd.<br/>
            Hartelijk dank voor uw medewerking.<br/>
            Veiligheidsregio<br/>
            Kenniscentrum Kusttoerisme<br/>
            HZ University of Applied Sciences, Lectoraat Data Science<br/>
        </div>
    </div>
@endsection
