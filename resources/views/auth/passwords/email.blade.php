@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="color: white; border: 1px solid white; box-shadow: 0 2px 5px rgba(0,0,0,.25);" class="card">
                <div style="background-color: rgb(158 138 122 / var(--tw-bg-opacity));" class="bg-[#9E8A7A] card-header">{{ __('Reset Password') }}</div>

                <div style="background-color: #ffffff" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form style="color: #47372a;" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="background-color:#9E8A7A; border: none;" type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }} 
                                    {{-- 버튼 누르면 메소드 오류 남. GET이 아닌 POST사용... 어디에 바꾸어야할지 모르겠음 --}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
