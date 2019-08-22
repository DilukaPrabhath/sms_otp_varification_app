<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testotp2;

class otpController extends Controller
{
    //


      public function store(Request $request)
    {
        //return "HI";


    	$genopt = new Testotp2;

    	$genopt->mobile  = $request->mobile; 
    	$genopt->status  = 0;
                   $ran  = rand ( 100000 , 999999 );
        $genopt->otp_num = $ran;
        

        $genopt->save();
        return back();
        
    }

     public function varify_otp(Request $request)
    {
        //return "HI";


        $mobile =    $request->mobile;
        $otp    =    $request->otp;


        $check  = Testotp2::select('otp_num')->where('mobile',$mobile)->get()->last();

        $correct_otp = $check['otp_num'];

        if ($otp == $correct_otp) {

      $date1   = Testotp2::select('created_at')->where('otp_num',$correct_otp)->get()->last();
      $r_date1 = $date1['created_at'];
      // $date2   = Testotp2::select('created_at')->where('otp_num',$otp)->get()->last();
      // $r_date2 = $date2['created_at'];
      //$currentTime=time(); 
    
          $time = strtotime($r_date1);
             $now  = time();

                $defre = $now - $time;

                if (180 >= $defre) {
                    return 1;

            }
                else{
                    return 2;
                }
            }

        else{
            return 2;
        }
        
    }
}


