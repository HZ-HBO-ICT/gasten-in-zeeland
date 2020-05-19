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
                        <h1 class="title">Dagelijks rapport</h1>
                        @include('common.notifications')
                        <table class="table is-striped is-fullwidth">
                            <thead>
                            <th>{{ __('app.measured_at') }}</th>
                            <th>{{ __('app.number_of_registrations') }}</th>
                            <th>{{ __('app.daily_capacity') }}</th>
                            <th>{{ __('app.daily_max_capacity') }}</th>
                            <th>{{ __('app.percentage_capacity') }}</th>
                            <th>{{ __('app.number_of_overcrowded_registrations') }}</th>
                            </thead>
                            <tbody>
                            @foreach($report_data as $row)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($row->measured_at)
                                            ->translatedFormat('d F') }}</td>
                                    <td>{{ $row->number_of_registrations }}</td>
                                    <td>{{ $row->daily_capacity }}</td>
                                    <td>{{ $row->daily_max_capacity }}</td>
                                    <td>{{ number_format($row->percentage_capacity, 1) }}%</td>
                                    <td>{{ $row->number_of_overcrowded_registrations }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('admin.download_daily_report')}}"
                           class="button is-primary">{{ __('Download') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    </div>
@endsection
