<table class="table is-striped">
    <thead>
        <th>ID</th>
        <th>{{ __('app.date') }}</th>
        <th>{{ __('app.statuses.count') }}</th>
    </thead>
    <tbody>
    @foreach($statuses as $status)
        <tr>
            <td>{{ $status->id }}</td>
            <td>{{ $status->created_at }}</td>
            <td>{{ $status->count }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
