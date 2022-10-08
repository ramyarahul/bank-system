@extends('app')
@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
        	<div class="col-md-4">
            <div class="card">
                <div class="card-header"><b>{{ __ ('Deposit') }}</b></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create.deposit') }}">
                    @csrf                    	
                    	 
                           <div class="form-group mb-3">
                                <input type="text" placeholder="Amount" id="amount" class="form-control" name="amount" default='0' required autofocus>
                                @if ($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                          </div>
                          <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark">Deposit</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
