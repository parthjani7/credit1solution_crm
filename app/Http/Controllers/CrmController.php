<?php

namespace App\Http\Controllers;

use App\Models\Crmadmins;
use App\Models\CrmPasswordReset;
use App\Http\Requests\LoginCrmRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CrmController extends Controller
{

    public function response()
    {
        return view("crm.dashboard.response")->with("resclass", "set");
    }

    public function options()
    {
        if (auth()->user()->role != 'Admin')
            return redirect()->to("/response");
        return view("crm.dashboard.options")->with("optclass", "set");
    }

    public function invite()
    {
        if (auth()->user()->role != 'Admin')
            return redirect()->to("/response");

        return view("crm.dashboard.invite")->with("invclass", "set");
    }

    public function agreement()
    {
        if (auth()->user()->role != 'Admin')
            return redirect()->to("/response");
        return view("crm.dashboard.agreement")->with("agreclass", "set");
    }

    public function user()
    {
        return view("crm.dashboard.user")->with("invclass", "set");
    }
    public function logout()
    {
        session()->remove("admin");
        return redirect()->to("crm\login");
    }
}
