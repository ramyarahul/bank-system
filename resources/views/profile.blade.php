@extends('app')
@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
        	<div class="col-md-4">
            <div class="card">
                <div class="card-header"><b>{{ __ ('Profile') }}</b></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create.profile')}}">
                    @csrf
                    	
                    	 <div class="form-group mb-3">
                                <input type="text" placeholder="Account number" id="accountnumber" class="form-control" name="accountnumber" required autofocus>
                                @if ($errors->has('accountnumber'))
                                <span class="text-danger">{{ $errors->first('accountnumber') }}</span>
                                @endif
                          </div>
                           <div class="form-group mb-3">
                                <input type="text" placeholder="Outstanding Amount" id="outstanding" class="form-control" name="outstanding" default='0' required autofocus>
                                @if ($errors->has('outstanding'))
                                <span class="text-danger">{{ $errors->first('outstanding') }}</span>
                                @endif
                          </div>
                          <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark">Add</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
