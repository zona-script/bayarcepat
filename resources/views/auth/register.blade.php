<x-app-layout>

    <div class="hero is-primary">
        <div class="hero-body has-text-centered">
            <div class="container is-vcentered">
                <h1 class="title">Pendaftaran</h1>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                @include('partials.erros')
                <div class="box">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input @error('name') is-danger @enderror" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                            </div>

                            @error('name')
                            <span class="has-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control">
                                <input class="input @error('username') is-danger @enderror" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus autocomplete="username" />
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input @error('email') is-danger @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input @error('password') is-danger @enderror" type="password" name="password" placeholder="password" required autocomplete="new-password" />
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input @error('password_confirmation') is-danger @enderror" type="password" placeholder="password confirmation" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>

                        <div class="field">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>

                        <div class="field">
                            <button class="button is-primary is-fullwidth">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
