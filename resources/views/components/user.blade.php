@if($user)
    <div class="navbar-item">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">{{ $user->name }}</a>

            <div class="navbar-dropdown">
                @if($user->isAdmin)
                    <a class="navbar-item" href="/admin">
                        <span class="icon"><i class="fas fa-toolbox"></i></span>
                        <span>{{__('Admin')}}</span>
                    </a>
                @endif
                <a class="navbar-item" href="{{route('account.edit')}}">
                    <span class="icon"><i class="fas fa-user-cog"></i></span>
                    <span>{{__('Profile')}}</span>
                </a>
                <hr class="dropdown-divider">
                <a class="navbar-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span>{{__('Logout')}}</span>
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
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
