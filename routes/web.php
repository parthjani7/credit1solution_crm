<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Models\Crmadmins;
use App\Models\NotifSub;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Services\ContractAgreementService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Agreement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/step2', [SignupController::class, 'step2']);
Route::post('/step2', [SignupController::class, 'postSteptwo']);
Route::get('/thank_you', [SignupController::class, 'thank_you']);
Route::post('/step1', [SignupController::class, 'postRegisterStep1']);
Route::get('/step1', [SignupController::class, 'getRegister']);
Route::post('/step3', [SignupController::class, 'postRegisterStep3']);
Route::get('/step3', [SignupController::class, 'getRegisterStep3']);
Route::get("/final", [SignupController::class, 'getFinal']);

Route::get("/genpdf", function (ContractAgreementService $contractAgreementService) {
    $input = [
        "step1_fname" => "Courtney",
        "step1_serialno" => "917796248-NZU",
        "step1_mname" => "Crystal",
        "step1_lname" => "Rivers",
        "step1_paddress" => "392 shelby ave apt 6",
        "step1_city" => "Radcliff",
        "step1_state" => "KY",
        "step1_zip" => "40160",
        "step1_mpaddress" => "392 shelby ave apt 6",
        "step1_mcity" => "Radcliff",
        "step1_mstate" => "KY",
        "step1_mzip" => "40160",
        "step1_hno" => "",
        "step1_mno" => "912-210-1424",
        "step1_email" => "ccbarker86@gmail.com",
        "step2_packagedate" => "2015-7-23",
        "step2_package" => "FreshStart",
        "step2_card_number" => "4236-9810-0312-3303",
        "step2_month" => "06",
        "step2_year" => "17",
        "step2_cvv" => "509",
        "step2_full_name" => "Courtney Crystal Rivers",
        "step2_card_type" => "Visa",
        "step2_account_type" => "Checking Account",
        "step2_bank_name" => "FORT KNOX CREDITUNION",
        "step2_routing_number" => "283978425",
        "step2_account_number" => "10092044",
        "month" => "11",
        "day" => "8",
        "year" => "1986",
        "dls" => "KY",
        "dln" => "B05-280-537",
        "ssn" => "435-71-2343",
    ];

    $dateArray =   explode("-", Carbon::createFromDate(2015, 7, 10)->toDateString());
    $todayInput = $dateArray[1] . "/" . $dateArray[2] . "/" . $dateArray[0];
    $dateArray = explode("-", Carbon::createFromDate(2015, 7, 10)->addDays(3)->toDateString());
    $threeInput = $dateArray[1] . "/" . $dateArray[2] . "/" . $dateArray[0];
    $input["step1_state_info"] = "Kentucky";
    $packageDate = explode("-", $input["step2_packagedate"] . "");
    $then = Carbon::createFromDate($packageDate[0], $packageDate[1], $packageDate[2]);
    $after = Carbon::createFromDate($packageDate[0], $packageDate[1], $packageDate[2]);
    $input["credit_report_date"] = "Jul 10, 2015 17:17:56";
    $input["first_payment_date"] = $then->toFormattedDateString();
    $input["service_start_date"] = $then->addDays(30)->toFormattedDateString();
    $input["today"] = $todayInput;
    $input["three_today"] = $threeInput;
    $input["fpd_pdf"] = $input["first_payment_date"];
    $input["ssd_pdf"] =   $input["service_start_date"];
    $input["crd_pdf"] = Carbon::createFromDate(2015, 7, 10)->toFormattedDateString();
    $input["signature"] = explode("-", $input["ssn"])[2];
    $input["agreement_date"] = Carbon::createFromDate(2015, 7, 10)->format('jS \d\a\y \\of F') . ", " . substr(Carbon::createFromDate(2015, 7, 10)->format('Y'), 0, 2) . "{" . substr(Carbon::createFromDate(2015, 7, 10)->format('Y'), 2, 4) . "}";
    $tempDate = array();
    for ($i = 4; $i <= 15; $i++) {
        $tempDate[$i . ""] = $i . "th";
    }
    $selectedDay = array_merge(["1" => "1st", "2" => "2nd", "3" => "3rd"], $tempDate);
    $input["day_diff"] = $selectedDay[$after->diffInDays(Carbon::createFromDate(2015, 7, 10)) - 1];

    $input["package_image"] = ($input["step2_package"] == "Comprehensive") ? URL::asset("/images") . '/cs.jpg' : URL::asset("/images") . '/fss.jpg';
    // dd($input);
    $input['pdf_content'] = $contractAgreementService->getAll($input);
    $pdf = Pdf::loadView('pdf.agreement', $input);
    $paper_size = array(0, 0, 790, 850);
    $pdf->setPaper($paper_size, "portrait");
    return $pdf->download("agreement.pdf");
});

// Route::get("/test",function(){
// $profiles = Profile::all();
// 	foreach ($profiles as $profile) {
// 		$profile->btc = "Morning";
// 		$profile->in = "Auto Purchase";
// 		$profile->hau = "Auto Dealer";
// 		$profile->ml = 0;
// 		$profile->save();
// 	}
// $crm = new Crmadmins;
// $crm->username = "Test Admin";
// $crm->email = "test1234@gmail.com";
// $crm->password = Hash::make("test1234");
// $crm->user_state = 1;
// $crm->save();
// });

Route::get('page/{id}', [WelcomeController::class, 'page']);

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::middleware(['auth:admin'])->as('admin.')->group(function () {

    // Route::get('/forgotpassword', [CrmController::class, 'forgotpassword'])->name('forgotpassword');
    // Route::post('/forgotpassword', [CrmController::class, 'doForgotpassword'])->name('doForgotpassword');

    // Route::get('/passwordreset', [CrmController::class, 'passwordreset'])->name('passwordreset');
    // Route::post('/passwordreset', [CrmController::class, 'doPasswordreset'])->name('doPasswordreset');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/profile', ProfileController::class)->name('profile');

    Route::get('/agreements', AgreementController::class)->name('agreements');

    Route::get('/options', [CrmController::class, 'options'])->name('options');

});

Route::post('signup/payment', array(
    'as' => 'payment',
    'uses' => [SignupController::class, 'postPayment'],
));

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => [SignupController::class, 'getPaymentStatus'],
));

Route::get("/clearsession", function () {
    if (session()->has('register_steps'))
        session()->pull('register_steps');
    if (session()->has("current_step"))
        session()->pull("current_step");
});
