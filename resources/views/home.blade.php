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
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            Beste ondernemer,<br/>
                            Vanaf heden is registratie niet meer nodig! De gegevens van het registratiesysteem worden binnen drie weken
                            (vanaf 17-6) verwijderd.<br/>
                            Hartelijk dank voor uw medewerking.<br/>
                            Veiligheidsregio<br/>
                            Kenniscentrum Kusttoerisme<br/>
                            HZ University of Applied Sciences, Lectoraat Data Science<br/>
                        </div>
                        <h2></h2>
                        @if(Auth::user()->statuses()->count() > 0)
                            @include('statuses.index_table', [
                                'statuses' => Auth::user()->statuses()->orderBy('measured_at', 'desc')->get()
                            ])
                        @endif
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
