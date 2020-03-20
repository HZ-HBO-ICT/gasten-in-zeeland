@if($user)
<div class="navbar-item">
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">{{ $user->name }}</a>

        <div class="navbar-dropdown">
            <a class="navbar-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                {{ __('app.logout') }}
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

</div>
@else
<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link">{{ __('app.login') }}</a>

    <div class="navbar-dropdown">
        <a class="navbar-link" href="\login">{{ __('app.login') }}</a>
        <a class="navbar-link" href="\register">{{ __('app.register') }}</a>
    </div>
</div>
@endif
