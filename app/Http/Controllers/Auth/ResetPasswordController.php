<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Crmadmins;
use App\Models\CrmPasswordReset;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        $reset = CrmPasswordReset::whereRaw("token = ?", array($token))->first();
        if ($reset->count() == 0) {
            abort(403, 'Unauthorized action.');
        }

        $admin = Crmadmins::whereEmail($reset->email)->active()->first();
        if ($admin->count() == 0) {
            abort(403, 'Unauthorized action.');
        }

        return view('crm.passwordreset', array('email' => $admin->email, 'token' => $token));
    }

    public function reset(Request $request)
    {

        Validator($request->all(), [
            'token' => 'required|exists:crm_password_resets,token',
            'email' => 'required|exists:crm_password_resets,email|exists:crm_admins,email',
            'password' => 'required|confirmed|min:8',
        ])->validate();

        $admin = Crmadmins::whereEmail($request->email)->active()->first();
        if ($admin?->count() == 0) {
            abort(403, 'Unauthorized action.');
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        CrmPasswordReset::whereEmail($request->email)->delete();

        Auth::guard('admin')->login($admin);

        return redirect()->to("/response");
    }
}
