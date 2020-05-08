@extends('common.page')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body" style="
            background: url('/img/20200430_133650.png') no-repeat center bottom;
            background-size: cover;"
        ></div>
    </section>

    <div class="column is-offset-3-desktop is-6-desktop is-12-tablet">
        <div class="title">{{ __('Update your account profile') }}</div>
        <form method="POST" action="{{ route('account.update') }}" class="box">
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
            <div class="field is-grouped">
                {{-- Here are the form buttons: save, reset and cancel --}}
                <div class="control">
                    <button type="submit" class="button is-primary">{{ __('Update') }}</button>
                </div>
                <div class="control">
                    <button type="reset" class="button is-warning">{{ __('Reset') }}</button>
                </div>
                <div class="control">
                    <a type="button" href="/" class="button is-light">{{ __('Cancel') }}</a>
                </div>
            </div>
        </form>
@endsection
