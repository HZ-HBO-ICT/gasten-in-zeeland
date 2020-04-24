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
    <p>
        Stapsgewijze openstelling van recreatiebedrijven zoals de Veiligheidsregio heeft
        aangekondigd is alleen mogelijk op voorwaarde dat overnachtingen geregistreerd worden.
        Op deze manier kan het aantal mensen in Zeeland gemonitord worden in relatie tot de
        zorgcapaciteit. We vragen u om de registratie dagelijks volledig in te vullen.
    </p>
    <p>
        De gegevens worden beheerd door het Kenniscentrum Kusttoerisme en kunnen alleen
        geanonimiseerd door de Veiligheidsregio ingezien worden. Om privacy redenen worden de
        gegevens na drie weken vernietigd.
    </p>
    <a class="button is-success" href="/register">
        {{ __('Register') }}
    </a>
    </div>
@endsection
