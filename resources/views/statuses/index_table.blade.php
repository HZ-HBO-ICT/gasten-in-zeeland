<table class="table is-striped">
    <thead>
        <th>{{ __('app.date') }}</th>
        <th>{{ __('app.statuses.count') }}</th>
    </thead>
    <tbody>
    @foreach($statuses as $status)
        <tr>
            <td>{{ $status->measured_at->locale(app()->getLocale())->isoFormat('D MMMM YYYY') }}</td>
            <td>
                <span class="{{ $status->is_overcrowded ? 'has-text-danger' : '' }}">
                    {{ $status->count }}
                    @if($status->is_overcrowded)
                        &nbsp;<i class="fas fa-exclamation-triangle"></i></span>
                    @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
