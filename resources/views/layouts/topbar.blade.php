<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <a class="navbar-brand" href="home">
        <img alt="Brand" width="100" src="{{ URL::asset('assets/images/logo/logo.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Media.Media.index') }}">Manage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#loginModal" href="#">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#registerModal" href="#">{{ __('Register') }}</a>
            </li>
            @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-3 text-center">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                        <img class="center-block mt-3" alt="Brand" width="200" src="{{ URL::asset('assets/images/logo/logo.png') }}">
                        
                        <h1 class="p-4 mt-0">Welcome to Fline</h1>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                                <div class="col-md-7 mx-auto">
                                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                                <div class="col-md-7 mx-auto">
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-2">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class=" col-md-5 mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                        {{ __('Login') }}
                                    </button>


                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class=" col-md-6 mx-auto">
                                    <small>By continuing, you agree to Fline's <strong>Terms of Service</strong> and acknowledge you've read our <strong>Privacy Policy</strong></small>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class=" col-md-2 mx-auto">
                                    <hr style="border-top: 1px solid white;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class=" col-md-6 mx-auto">
                                    <a data-toggle="modal" data-target="#registerModal" href="#" data-dismiss="modal"><small><strong>Not in Fline yet? Sign up</strong></small></a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-3 text-center">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                        <img class="center-block mt-3" alt="Brand" width="200" src="{{ URL::asset('assets/images/logo/logo.png') }}">
                        <h1 class="pt-4">Welcome to Fline</h1>
                        <h6 class="mb-4">Find new ideas to try</h6>

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                            <div class="col-md-7 mx-auto">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-7 mx-auto">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-7 mx-auto">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-7 mx-auto">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                            <div class="form-group row mb-0">
                                <div class=" col-md-6 mx-auto">
                                    <small>By continuing, you agree to Fline's <strong>Terms of Service</strong> and acknowledge you've read our <strong>Privacy Policy</strong></small>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class=" col-md-2 mx-auto">
                                    <hr style="border-top: 1px solid white;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class=" col-md-6 mx-auto">
                                    <a data-toggle="modal" data-target="#loginModal" href="#" data-dismiss="modal"><small><strong>Already a member? Log in</strong></small></a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
