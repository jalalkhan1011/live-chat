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
                        @foreach ($users as $user)
                            <div class="card mt-2">
                                <h5 class="card-header">{{ ucfirst($user->name ?? '') }}</h5>
                                <div class="card-body">
                                    <a href="{{ route('chat', $user->id) }}" class="btn btn-primary">{{ __('Chat') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
