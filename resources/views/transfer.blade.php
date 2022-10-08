@extends('app')
@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
        	<div class="col-md-4">
            <div class="card">
                <div class="card-header"><b>{{ __ ('Transfer') }}</b></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create.transfer')}}">
                    @csrf
                    	 
                    	 <div class="form-group mb-3">
                                <input type="text" placeholder="email from" id="emailfrom" class="form-control" name="emailfrom" required autofocus>
                                @if ($errors->has('emailfrom'))
                                <span class="text-danger">{{ $errors->first('emailfrom') }}</span>
                                @endif
                          </div>
                          <div class="form-group mb-3">
                                <input type="text" placeholder="email to" id="emailto" class="form-control" name="emailto" required autofocus>
                                @if ($errors->has('emailto'))
                                <span class="text-danger">{{ $errors->first('emailto') }}</span>
                                @endif
                          </div>
                           <div class="form-group mb-3">
                                <input type="text" placeholder="Amount" id="amount" class="form-control" name="amount" default='0' required autofocus>
                                @if ($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                          </div>
                          <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark">Transfer Money</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
