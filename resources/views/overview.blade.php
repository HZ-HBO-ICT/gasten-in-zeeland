@extends('common.page')

@section('content')
<div class="column is-offset-3-desktop is-6-desktop is-12-tablet">
   
    <form method="POST" action="{{ route('update') }}" class="box">
    
            
            @csrf
            {{method_field('PATCH')}}
            <div class="field">
                <label for="name" class="label">{{ __('Name') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="name" name="name" placeholder="{{ $user->name }}"
                           class="input @error('name') is-danger @enderror"
                           value="{{ $user->name }}" required autocomplete="name" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
                    @error('name')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('name')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="organisation" class="label">{{ __('Naam van uw onderneming') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="text" name="organisation" placeholder="{{ $user->organisation }}"
                           class="input @error('organisation') is-danger @enderror"
                           value="{{ $user->organisation }}" required autocomplete="organisation" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fas fa-hotel"></i>
                </span>
                    @error('organisation')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('organisation')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="accommodation" class="label">{{ __('Accomodatie (indien van toepassing)') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="text" name="accommodation" placeholder="{{ $user->accommodation }}"
                           class="input @error('accommodation') is-danger @enderror"
                           value="{{ $user->accommodation }}" autocomplete="accommodation" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fas fa-hotel"></i>
                </span>
                    @error('accommodation')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('accommodation')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="max_capacity"
                       class="label">{{ __('Maximum number of guests for your establishment') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="text" name="max_capacity" placeholder="{{ $user->max_capacity }}"
                           class="input @error('max_capacity') is-danger @enderror"
                           value="{{ $user->max_capacity }}" required autocomplete="max_capacity" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fas fa-bed"></i>
                </span>
                    @error('max_capacity')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('max_capacity')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="email" name="email" placeholder="{{ $user->email }}"
                           class="input @error('email') is-danger @enderror"
                           value="{{ $user->email }}" required autocomplete="email" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                    @error('email')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('email')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="kvk_number" class="label">{{ __('KVK-nummer') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="integer" name="kvk_number" placeholder="{{ $user->kvk_number }}"
                           class="input @error('kvk_number') is-danger @enderror"
                           value="{{ $user->kvk_number }}" required autocomplete="kvk_number" autofocus>
                    <span class="icon is-small is-left">
                        <i class="fas fa-kvk_number"></i>
                    </span>
                    @error('kvk_number')
                    <span class="icon is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('kvk_number')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="password" class="label">{{ __('New Password') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="password" name="password"
                           class="input @error('password') is-danger @enderror"
                           value="{{ $user->password }}" required autocomplete="password" autofocus>
                    <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
                    @error('password')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('password')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label for="password_confirmation" class="label">{{ __('Confirm New Password') }}</label>
                <div class="control has-icons-left has-icons-right">
                    <input type="password" name="password_confirmation"
                           class="input @error('password_confirmation') is-danger @enderror"
                           value="{{ $user->password }}" required autocomplete="password_confirmation">
                    <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
                    @error('password_confirmation')
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                    @enderror
                </div>
                @error('password_confirmation')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field is-grouped">
                {{-- Here are the form buttons: save, reset and cancel --}}
                <div class="control">
                    <button type="submit" class="button is-primary">{{ __('Update') }}</button>
                </div>
                <div class="control">
                    <a type="button" href="/" class="button is-light">{{ __('Cancel') }}</a>
                </div>
            </div>
            
        </form>
   
   

@endsection