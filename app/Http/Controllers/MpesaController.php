<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\MpesaTransaction;
use App\Models\Payment;
use App\Mail\OrderPlaced;
class MpesaController extends Controller
{
    //
	public function lipaNaMpesaPassword(){
		$timestamp = Carbon::rawParse('now')->format('YmdHms');
		$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
		$businessShortCode = 174379;
		$mpesaPassword = base64_encode($businessShortCode.$passkey.$timestamp);
		return $mpesaPassword;
	}
	
	public function newAccessToken(){
		$consumer_key = "CpLx1s1ALGJPwS8w0FKpoAKQSi1nASbH";
		$consumer_secret = "DZgIEcYAZ8K4NoCI";
		$credentials = base64_encode($consumer_key.":".$consumer_secret);
		$url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials,'Content-Type:applicatin/json'));
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);
		$access_token=json_decode($curl_response);
		curl_close($curl);
		return $access_token->access_token;
	}
	
	public function stkPush(Request $request,$amount){
		
		$cart = \Cart::getSubtotal();
		$user = $request->user; //Displays on the checkout form
		$amount = $request->amount;
		$phone = $request->phone;
		$formatedPhone = substr($phone,1);
		$code = "254";
		$phoneNumber = $code.$formatedPhone; //concatinates the country code and the phone number
		
		
		
		$url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
		$curl_post_data = [
		'BusinessShortCode' => 174379,
		'Password'=>$this->lipaNaMpesaPassword(), //The Method we made at the beginning
		'Timestamp'=>Carbon::rawParse('now')->format('YmdHms'),
		'TransactionType'=>'CustomerPayBillOnline',
		'Amount'=> 1, 
		'PartyA'=> $phoneNumber,
		'PartyB'=>174379,
		'PhoneNumber'=> $phoneNumber,
		'CallBackURL'=> 'https://3e6d-197-248-92-161.ngrok.io/api/stk/push/callback/url', 
		'AccountReference'=> "Life Is Spiritual",
		'TransactionDesc'=> "Lipa na M-pesa"
		];
		
		$data_string = json_encode($curl_post_data);
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url); 
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->newAccessToken())); //make sure of the space
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		$curl_response = curl_exec($curl);
		\Log::info($curl_response);
		
		
		 //$pays = Payment::all();
		//$pays = Payment::latest()->get();
		
		
		return redirect('/confirm');
		//return redirect()->route('confirm', compact('pays'));
		 //return view('confirm', compact('pays'));
		
	}
	
	public function MpesaRes(Request $request){
		\Log::info($request);
		$response = json_decode($request->getContent());
		$resData =  $response->Body->stkCallback->CallbackMetadata;
        $reCode =$response->Body->stkCallback->ResultCode;
        $resMessage =$response->Body->stkCallback->ResultDesc;
        $amountPaid = $resData->Item[0]->Value;
        $mpesaTransactionId = $resData->Item[1]->Value;
        $paymentPhoneNumber =$resData->Item[4]->Value;
        //replace the first 254 with 0
        $formatedPhone = str_replace("254","0",$paymentPhoneNumber);
		$payment = new Payment;
        $payment->amount = $amountPaid;
        $payment->mpesa_trans_id = $mpesaTransactionId;
        $payment->phone = $formatedPhone;
        $payment->save();
		\Log::info("Transaction ".$mpesaTransactionId." of amount ".$amountPaid." from phone number ".$formatedPhone." has been completed successfully");
		
	}
	
	public function confirmPayment(Request $request){
		$request->validate(['transactionId'=>'required']);
		$transId = $request->transactionId;
		$exists = Payment::where('mpesa_trans_id',$transId)->latest()->first();
		//Here you can redirect to the same page, because the payment is not successful or the transaction id provided does not match any payment
		if(!$exists){
			$error= ["success"=>false, "error"=>"Unable to confirm your transaction code. Please contact admin.. :)"];
			session($error);
			return back();
		}
		$message = ["success"=>true, "message"=>"Payment Successful!"];Mail::send(new OrderPlaced);
		session($message);
		//here you can redirect to a page to be shown after the user has paid successfuly!
		return redirect('combine');
		
	}
	
	

	

}
