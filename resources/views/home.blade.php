@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="color: white; border: 1px solid white; box-shadow: 0 2px 5px rgba(0,0,0,.25);" class="card">
                <div style="background-color: rgb(158 138 122 / var(--tw-bg-opacity));" class="bg-[#9E8A7A] card-header">{{ __('Dashboard') }}</div>

                <div style="background-color: #ffffff; color: #47372a;" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
