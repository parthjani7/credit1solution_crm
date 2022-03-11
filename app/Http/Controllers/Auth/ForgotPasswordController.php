<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CrmAdmin;
use App\Models\CrmPasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view("crm.forgotpassword");
    }

    public function sendResetLinkEmail(Request $request)
    {
        $inputs = $request->all();

        $admin = CrmAdmin::whereRaw("email = ? and status='active'", array($inputs['email']));
        if ($admin->count() == 0) {
            return view("crm.forgotpassword")->with('errormessage', "User doesn't exist");
        }

        $admin = $admin->first();
        $token = Str::random(45);
        $url = URL::to("/password/reset/$token");

        CrmPasswordReset::create([
            'email' => $admin->email,
            'token' => $token,
        ]);

        Mail::send('emails.reset_password', ["to" => $admin->username, 'url' => $url], function ($message) use ($admin) {
            $message->to($admin->email, $admin->username)->subject("Password reset at Credit1solutions.com CRM");
        });

        return view("crm.forgotpassword")->with('successmessage', "An emails has been sent to email {$admin->email}");
    }
}
