@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="mt-4">
                        <h3>Modules:</h3>
                        <ul>
                            <li><a href="{{ route('masterdata.index') }}">Master Data</a></li>
                            <!-- Add more module links here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
