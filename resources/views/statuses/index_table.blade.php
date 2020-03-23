<table class="table is-striped">
    <thead>
        <th>{{ __('app.date') }}</th>
        <th>{{ __('app.statuses.count') }}</th>
    </thead>
    <tbody>
    @foreach($statuses as $status)
        <tr>
            <td>{{ $status->measured_at->locale(app()->getLocale())->isoFormat('D MMMM YYYY') }}</td>
            <td>{{ $status->count }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
