<?php

class ClearingController extends BaseController {

	function CheckAccounts()
	{

		$date = date('Y-m-d');

		$ctr = 0;

		$clearing_day = DB::table('clearing_day') 
         ->where('created_at','like', '%'.$date.'%')
         ->get();

		if (count($clearing_day) > 0) 
		{
			$name = Session::get('user_first_name') . ' ' .Session::get('user_last_name');

			Session::put('msg', $name. ' already cleared all the accounts for this month');
		}

		else
		{

			$accounts = DB::table('accounts') 
	       	 ->where('type','=','Credit')
	         ->get();


			foreach($accounts as $accounts2)
			{
				$accountNumber = $accounts2->id;
				$accountUpdate = accounts::find($accountNumber);

				$transaction = new transaction;

				if($accounts2->balance == 0)
				{
					$accountUpdate->status = 0;

					$transaction->amount = 0;
	                $transaction->transaction = "Closed Account";
	                $transaction->total_balance = 0;
	                $transaction->type = "Closed Account";
	                $transaction->account_number = $accountNumber;
                	$transaction->save();
				
				}
				else if($accounts2->balance < 10000)
				{
					$balance = $accounts2->balance - 300;
					$accountUpdate->balance = $balance;

					$transaction->amount = 300;
	                $transaction->transaction = "Penalty";
	                $transaction->total_balance = $balance;
	                $transaction->type = "Penalty";
	                $transaction->account_number = $accountNumber;
                	$transaction->save();
				}
				else if($accounts2->balance < 300)
				{
					$balance = $accounts2->balance - 300;
					$accountUpdate->balance = $balance;
					$accountUpdate->status = 0;

					$transaction->amount = 300;
	                $transaction->transaction = "Closed Account";
	                $transaction->total_balance = $balance;
	                $transaction->type = "Closed Account";
	                $transaction->account_number = $accountNumber;
                	$transaction->save();
				}

	            $accountUpdate->save();

	            $ctr++;

			}


			$clearing_day = new ClearingDay;
			$clearing_day->cleared_by = Session::get('user_last_name') . ',' .Session::get('user_first_name');
			$clearing_day->save();

			Session::put('ctr', $ctr);



		}



		return Redirect::back();
	}
	
}
