@extends('layouts.default')

@section('content')

	<script >
		
		    $(function () {

    			var date = new Date();


    			$("#check").hide();
    			$("#check2").hide();
    			
    			if(date.getDate() == 28 && date.getHours() >= 15)
    			//if(date.getDate() == 11 && date.getHours() >= 11)
    			{
    				$("#clearingDayLink").show();
    				$("#clearingDayLink2").hide();
	    		}
	    		else
	    		{
	    			$("#clearingDayLink").hide();
    				$("#clearingDayLink2").show();
	    		}

	    		//alert($("#check").text());

	    		if($("#check").text() != "")
	    		{
	    			alert("Accounts Successfully Cleared For this Month");

	    		}
	    		else if($("#check2").text() != "")
	    		{
	    			alert($("#check2").text());

	    		}

			});


	</script>

	<table border=0 width="100%">
        <tr>
            <td>
            	<h2></i><i class="fa fa-users"></i> Profile Information</h2>
            	<p id="check">{{Session::get('ctr')}}</p>

            	{{Session::put('ctr', '')}}

            	<p id="check2">{{Session::get('msg')}}</p>

            	{{Session::put('msg', '')}}

            </td>
            <td align="right">

            	<a  class="btn btn-primary" id="clearingDayLink" href="/otc/Clearing">Clearing Day</a>
            	<button  class="btn btn-default" id="clearingDayLink2" disabled>Clearing Day</button>
            </td>
        </tr>
    </table>

		<div class="form-create col-md-6" >
			<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Name</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ Session::get('user_first_name') . ' ' . $user->middle_name . ' ' . Session::get('user_last_name') }}" disabled>
		    		</div>
		  		</div>
		  	</div>

	  		<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Email</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $user->email }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Gender</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $user->gender }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Contact No.</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ '+63' . $user->contact }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<?php
			  	if($user->user_type == 1)
			  	{
			  		$usertype = 'Admin';
			  	}
			  	else if( $user->user_type == 2 )
			  	{
			  		$usertype = 'Bank Manager';
			  	}
			  	else if( $user->user_type == 3 )
			  	{
			  		$usertype = 'Bank Assitant';
			  	}
			  	else
			  	{
			  		$usertype = 'Teller';
			  	}
		  	?>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Position</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $usertype }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Address</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $user->address }}" disabled>
		    		</div>
		  		</div>
		  	</div>



		</div>



@stop
