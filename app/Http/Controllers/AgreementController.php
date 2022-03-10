<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgreementController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()->role != 'Admin') {
            return redirect()->route('admin.dashboard');
        }
        return view("crm.dashboard.agreement")->with("agreclass", "set");
    }
}
