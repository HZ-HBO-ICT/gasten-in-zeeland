@if($user)
<div class="navbar-item">
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">{{ $user->name }}</a>

        <div class="navbar-dropdown">
            @if($user->isAdmin)
                <a class="navbar-item" href="{{ route('admin') }}">
                    <i class="fas fa-cogs"></i>&nbsp;{{__('Admin')}}
                </a>
                <hr class="dropdown-divider">
            @endif
            <a class="navbar-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Logout') }}
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
        <a class="navbar-item" href="\login">{{ __('Login') }}</a>
        <a class="navbar-item" href="\register">{{ __('Register') }}</a>
    </div>
</div>
@endif
