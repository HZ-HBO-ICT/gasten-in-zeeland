@if($user)
<div class="navbar-item">
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">{{ $user->name }}</a>

        <div class="navbar-dropdown">
            <a class="navbar-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                {{ __('Logout') }}
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <div class="navbar-dropdown">
             <a class="navbar-item" href="/overview">{{__('Overzicht')}}</a>
            <form id="frm-overview" action="{{ route('overview') }}" method="GET" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        @if($user->isAdmin)
        <div class="navbar-dropdown">
             <a class="navbar-item" href="/admin">{{__('Admin')}}</a>
            <form id="frm-admin" action="{{ route('admin') }}" method="GET" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        @endif
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
