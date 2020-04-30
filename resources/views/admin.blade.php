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
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium error
                        inventore modi neque nulla porro dolorem provident, molestias vero ea
                        earum asperiores optio et minus eius sint. Distinctio, ut deserunt.
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection
