<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{

    private $sid;
    private $token;
    private $services;

    public function __construct() {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->twilio = new Client($this->sid, $this->token);
    }


    public function get_otp(Request $request)
    {
        if (!$request || !$request->all())
        {
            return response()->json(["message"=>"Phone number missing"], 422);
        }
        try
        {
            $phone = "+506".$request->all()['phone'];
            $verification = $this->twilio->verify->v2->services(config('services.twilio.services'))
                                                        ->verifications
                                                        ->create($phone,"whatsapp");
            return response()->json([
                "status"=>"send",
                "Verification"=>$verification->accountSid
            ], 200);
        }catch(e){return response()->json(["message"=>"Phone number missing"], 422);}
    }

    public function verify_otp(Request $request)
    {
        if (!$request || !$request->all())
        {
            return response()->json(["message"=>"Phone number missing"], 422);
        }
        try
        {
            $phone = "+506".$request->all()['phone'];
            $code = $request->all()['code'];
            $verification = $this->twilio->verify->v2->services(config('services.twilio.services'))
                                                        ->verificationChecks
                                                        ->create([
                                                            "to" => $phone,
                                                            "code" => $code
                                                        ]);
            return response()->json([
                "status"=>"completed",
                "Verification"=>$verification->status
            ], 200);
        }catch(e){return response()->json(["message"=>"Phone number or code mismatch"], 422);}
    }
}
