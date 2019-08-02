@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col m6 s12" style="margin:3%;">
            <p class="flow-text">Get a free account</p>
            <p >Suffering from doubts? Don't know where to get started on your homeworks and project works?</p>
            <h5>Your one-stop solution : <strong>प्रश्न उत्तर</strong></h5>
            <br/>
            
            <blockquote>
            <p>Everyday I wish there was a starup to outsourse our homeworks.</p>
            <h5 class="right-align"> -Saramsha Dotel</h5>
            <span class="right"><i>Co-founder</i></span> 
            </blockquote>
            

        </div>
        <div class="col-md-6">
            <div class="card grey lighten-4 grey-text text-darken-4 z-depth-2">
            <div class="card-content">
                <div class="card-title float-text">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-field">
                            <input id="email" type="email" class="validate form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" data-error="invalid" data-success="valid">{{ __('E-Mail Address') }}</label>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field">
                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <label for="password" >{{ __('Password') }}</label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <br/>                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                {{ __('Login') }}
                            </button>

                            <a class="btn-small btn-link waves-effect waves-light right" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
