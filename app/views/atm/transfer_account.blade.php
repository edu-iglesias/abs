@extends('layouts.atm_default')
@section('content')

	<div class="form-create col-md-12">
		<div class="forms col-md-12">
			{{ Form::open() }}
			<div class="forms col-md-12">
			<h3>Transfer Accounts</h3>
			<hr>

			@if(Session::get('success_user_created'))
		      	<div class="alert alert-success fade in" role="alert">
		        	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		        	<center>{{ Session::get('success_user_created') }}</center>
		      	</div>
		      	{{ Session::forget('success_user_created') }}
	    	@endif
			
			<?php $acc = DB::table('accounts')->where('type','credit')->get(); ?>
			<?php $a = DB::table('accounts')->where('id',Auth::customer()->get()->id)->first();  ?>
			
			
			<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('amount')) has-error @endif">
		       <p><h4>Current Balance: {{ $a->balance }}</h4></p>
		    </div>
			</div>

			<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('acct')) has-error @endif">
				
		       	<select id="acct" name="acct" class="form-control">
                     
                    <option value="">Select Account</option>
                    @foreach($acc as $a)
                    <option value="{{ $a->id }}">{{ $a->id }}</option>
                    
                   @endforeach
                </select>
                
		        @if ($errors->has('acct')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('acct') }}</p></i> @endif

		    </div>
			</div>
			
			
			<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('amount')) has-error @endif">
		       	{{ Form::text('amount','', array('class' => 'form-control', 'placeholder' => 'Amount to Deposit','maxlength'=>'5')) }}
		        @if ($errors->has('amount')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('amount') }}</p></i> @endif
		    </div>
			</div>
		   
			<div class="forms col-md-12">
			<div class="col-md-3 ">
		            {{ Form::submit('Submit', ['id'=>'submit','class' => 'btn btn-lg btn-success btn-block sbmt left-sbs','style'=>'width:40%; float:left;']) }}
		    </div>
		    {{Form::close() }}
		</div>
		</div>
			
		</div>
	</div>
	
@stop