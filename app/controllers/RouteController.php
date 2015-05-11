<?php

class RouteController extends BaseController {

	function atm()
	{
		$this->CheckInterest();
		return View::make('atm.index');
	}

	function otc()
	{

		$this->CheckInterest();
		return View::make('otc.index');
	}

	function profile()
	{
		$this->CheckInterest();
		$user = User::find(Session::get('user_id'));
		return View::make('otc.profile')->with('user',$user);
	}

	function profile_atm()
	{
		$this->CheckInterest();
		return View::make('atm.profile');
	}

	function CheckInterest()
	{


			$accounts = DB::table('accounts')
				->where('status','=', 1)
				->get();

			// $aid = 111110000;
			// $accounts2 = DB::table('accounts') 
   //       	->where('id','=', $aid)
   //       	->first();

			foreach($accounts as $accounts2)
			{
				$accountNumber = $accounts2->id;
				$accountUpdate = accounts::find($accountNumber);

				if($accounts2->type == "Fixed")
				{
					$date = date('Y-m-d');

					//$date = "2020-05-11";

					$interest_fixed = DB::table('interest') 
		         	->where('account_number','=', $accountNumber)
		         	->get();

		         	$amount = $accounts2->balance;

		         	if(count($interest_fixed) == 0)
		         	{

						if($date >= $accounts2->life_span)
						{
							$amount = $accounts2->balance;

							if($accounts2->balance >= 10000 && $accounts2->balance < 50000)
							{
								$interest = $amount * 0.005;
								$total_amount = ($amount * 0.005) + $amount;
								$accountUpdate->balance = $total_amount;
							}
							else if($accounts2->balance >= 50000 && $accounts2->balance < 100000)
							{
								$interest = $amount * 0.00625;
								$total_amount = ($amount * 0.00625) + $amount;
								$accountUpdate->balance = $total_amount;
								
							}
							else if($accounts2->balance >= 100000 && $accounts2->balance < 500000)
							{
								$interest = $amount * 0.0075;
								$total_amount = ($amount * 0.0075) + $amount;
								$accountUpdate->balance = $total_amount;
							}
							else if($accounts2->balance >= 500000 && $accounts2->balance < 1000000)
							{
								$interest = $amount * 0.00875;
								$total_amount = ($amount * 0.00875) + $amount;
								$accountUpdate->balance = $total_amount;
							}
							else if($accounts2->balance >= 1000000 && $accounts2->balance < 5000000)
							{
								$interest = $amount * 0.01;
								$total_amount = ($amount * 0.01) + $amount;
								$accountUpdate->balance = $total_amount;
							}
							else if($accounts2->balance >= 5000000)
							{
								$interest = $amount * 0.01125;
								$total_amount = ($amount * 0.01125) + $amount;
								$accountUpdate->balance = $total_amount;
							}
							
							$accountUpdate->save();

							$interest = new interest;
							$interest->account_number = $accountNumber;
							$interest->type = "fixed";
							$interest->date = $date;
							$interest->amount = $total_amount;
							$interest->save();

							$transaction = new transaction;
			                $transaction->account_number = $accountNumber;
			                $transaction->amount = $interest;
			                $transaction->transaction = "Interest";
			                $transaction->total_balance = $total_amount;
			                $transaction->type = "interest";
			                $transaction->save();
						}
					}

				}
				else
				{

					$interest_credit = DB::table('interest') 
		         	->where('account_number','=', $accountNumber)
		         	->get();

		         	$amount = $accounts2->balance;

		         	if(count($interest_credit) == 0)
		         	{

		         		$month_day = date("m-d", strtotime($accounts2->created_at));
		         		$year = date('Y', strtotime('+1 years'));
		         		$annum = $year. '-' .$month_day;

		         		$date = date("Y-m-d");

		         		//$date = "2016-05-11";

		         		if($date >= $annum)
		         		{
		         			if($amount >= 10000)
		         			{
			         			$total_amount = ($amount * 0.0025) + $amount;
								$accountUpdate->balance = $total_amount;
							}

							$accountUpdate->save();

							$interest_saved = new interest;
							$interest_saved->account_number = $accountNumber;
							$interest_saved->type = "credit";
							$interest_saved->date = $date;
							$interest_saved->amount = $total_amount;
							$interest_saved->save();

							$transaction = new transaction;
			                $transaction->account_number = $accountNumber;
			                $transaction->amount = $amount * 0.0025;
			                $transaction->transaction = "Interest";
			                $transaction->total_balance = $total_amount;
			                $transaction->type = "interest";
			                $transaction->save();
		         		}
		         	}
		         	else
		         	{
		         		$interest_credit = DB::table('interest') 
			         	->where('account_number','=', $accountNumber)
			         	->where('type','=', 'credit')
			         	->orderby('date','DESC')
			         	->first();



			         	$month_day = date("m-d", strtotime($interest_credit->date));
		         		$year = date("Y", strtotime($interest_credit->date)) + 1;
		         		$annum = $year. '-' .$month_day;

		         		$date = date("Y-m-d");

		         		//$date = "2016-05-11";

		         		//dd($annum);

		         		if($date >= $annum)
		         		{
		         			if($amount >= 10000)
		         			{
			         			$total_amount = ($amount * 0.0025) + $amount;
								$accountUpdate->balance = $total_amount;
							}

							$accountUpdate->save();

							$interest = new interest;
							$interest->account_number = $accountNumber;
							$interest->type = "credit";
							$interest->date = $date;
							$interest->amount = $total_amount;
							$interest->save();

							$transaction = new transaction;
			                $transaction->account_number = $accountNumber;
			                $transaction->amount = $amount * 0.0025;
			                $transaction->transaction = "Interest";
			                $transaction->total_balance = $total_amount;
			                $transaction->type = "interest";
			                $transaction->save();


		         		}

			         	
		         	}



				}
			

			 }


	}

}