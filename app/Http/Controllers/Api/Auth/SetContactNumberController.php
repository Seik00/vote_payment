<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\FailedToSendOtpException;
use App\Exceptions\FailedToVerifyContactNumberException;
use App\Exceptions\OTPExpiredException;
use App\Http\Controllers\Controller;
use App\Models\UserOtpCode;
use Cyaoz94\Sms123\Exceptions\SmsApiException;
use Cyaoz94\Sms123\Facades\Sms123Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SetContactNumberController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'jwt.auth'
        ]);
    }

    // todo: need to add throttling support
    // todo: implement job queue to prevent blocking
    public function setContactNumber(Request $request)
    {
        Validator::validate($request->all(), [
            'contact_number' => 'required',
        ]);

        $user = auth()->user();
        $contactNumber = $request->get('contact_number');

        // make sure previous OTP code deleted
        $existedOtp = $user->oneTimePasscode;
        if ($existedOtp) {
            $existedOtp->delete();
        }

        $code = mt_rand(100000, 999999);
        UserOtpCode::create([
            'user_id' => $user->id,
            'contact_number' => $contactNumber,
            'code' => $code,
            'expiry_date' => now()->addMinutes(5),
        ]);

        try {
            Sms123Facade::sendSms(
                $contactNumber,
                "To verify your contact number on CookX, use this OTP: {$code}. From volservers.com",
                Str::random(10)
            );
        } catch (SmsApiException $exception) {
            throw new FailedToSendOtpException();
        }

        return response()->json([
            'code' => 0,
            'data' => null,
            'message' => 'OTP_sent',
        ]);
    }

    public function verifyContactNumber(Request $request)
    {
        Validator::validate($request->all(), [
            'contact_number' => 'required',
            'passcode' => 'required',
        ]);

        $user = auth()->user();
        $contactNumber = $request->get('contact_number');
        $passcode = $request->get('passcode');

        $userOtp = $user->oneTimePasscode()
            ->where('contact_number', $contactNumber)
            ->where('code', $passcode)
            ->first();

        if (!$userOtp) {
            throw new FailedToVerifyContactNumberException();
        }

        if (now()->isAfter($userOtp->expiry_date)) {
            throw new OTPExpiredException();
        }

        // update user with contact number
        $user->contact_number = $userOtp->contact_number;
        $user->phone_verified_at = now();
        $user->save();

        // delete existing OTP
        $userOtp->delete();

        return response()->json([
            'code' => 0,
            'data' => null,
            'message' => 'REQUEST_COMPLETE',
        ]);
    }
}
