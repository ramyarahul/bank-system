@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome').' '. Str::ucfirst(Auth::User()->name) }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Your ID  :</th>
                                <th scope="col">{{Auth::User()->email}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Account Balance :</th>
                                <td> {{ $amount }}   </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection