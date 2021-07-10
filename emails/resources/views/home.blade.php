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

                        <div class="text-center">
                            <a href="{{ Route('export.excel') }}" class="btn btn-danger"> export to excel </a>
                        </div>

                        time : {{ $datess }}
                        @foreach ($enddate as $item)
                            @if ($item->enddate == $datess)
                                endtime _ last end: {{ $item->enddate }}                                                
                            @endif
                        @endforeach

                        <br>
                        <br>
                        <br>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
