@if($user)
<div class="navbar-item">
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">{{ $user->name }}</a>

        <div class="navbar-dropdown">
            <a class="navbar-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                {{ __('Logout') }}
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@else
<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link">{{ __('Login') }}</a>

    <div class="navbar-dropdown">
        <a class="navbar-link" href="\login">{{ __('Login') }}</a>
        <a class="navbar-link" href="\register">{{ __('Register') }}</a>
    </div>
</div>
@endif
