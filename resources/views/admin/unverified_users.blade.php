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
                        <h1 class="title">Verwijder ongeverifieerde gebruikers</h1>
                        @include('common.notifications')
                        <form action="{{ route('admin.unverified_users.delete') }}" method="POST">
                        @csrf
                            @method('DELETE')
                        <table class="table is-striped is-fullwidth">
                            <thead>
                            <th>#</th>
                            <th>{{ __('app.created_at') }}</th>
                            <th>{{ __('app.username') }}</th>
                            <th>{{ __('app.organisation') }}</th>
                            <th>{{ __('app.accomodation') }}</th>
                            <th>{{ __('app.kvk_number') }}</th>
                            <th>{{ __('app.max_capacity') }}</th>
                            </thead>
                            <tbody>
                            @foreach($unverified_users as $user)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->organisation }}</td>
                                    <td>{{ $user->accomodation }}</td>
                                    <td>{{ $user->kvk_number }}</td>
                                    <td>{{ $user->max_capacity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="field is-grouped">
                                {{-- Here are the form buttons: save, reset and cancel --}}
                                <div class="control">
                                    <button type="submit" class="button is-danger">{{ __('Delete') }}</button>
                                </div>
                            </div>
                        </form>
                        {{ $unverified_users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>

    </div>

@endsection
