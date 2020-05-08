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

                <div class="column is-offset-2-desktop is-8-desktop is-12-tablet">

                    <div class="">
                        <h1 class="title">Geverifieerde gebruikers</h1>
                        @include('common.notifications')

                        <table class="table is-striped is-fullwidth">
                            <thead>
                            <th>#</th>
                            <th>{{ __('app.username') }}</th>
                            <th>{{ __('app.organisation') }}</th>
                            <th>{{ __('app.accommodation') }}</th>
                            <th>{{ __('app.kvk_number') }}</th>
                            <th>{{ __('app.max_capacity') }}</th>
                            <th>{{ __('app.status_count') }}</th>
                            </thead>
                            <tbody>
                            @foreach($verified_users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->organisation }}</td>
                                    <td>{{ $user->accommodation }}</td>
                                    <td>{{ $user->kvk_number }}</td>
                                    <td>{{ $user->max_capacity }}</td>
                                    <td>{{ $user->statuses->count() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $verified_users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>

    </div>

@endsection
