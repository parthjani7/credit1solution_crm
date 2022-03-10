<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware(['auth:admin'])->as('admin.')->group(function () {
    Route::get('pages', [ApiController::class, 'pages'])->name('pages');

    Route::get('whyus', [ApiController::class, 'whyus'])->name('whyus');
    Route::post('whyus', [ApiController::class, 'postWhyus'])->name('whyus.store');

    Route::post('createwhyus', [ApiController::class, 'postCreatewhyus'])->name('createwhyus.store');
    Route::post('delpage', [ApiController::class, 'postDelpage'])->name('delpage.store');
    Route::post('delwhyus', [ApiController::class, 'postDelwhyus'])->name('delwhyus.store');
    Route::post('maindata', [ApiController::class, 'postMaindata'])->name('maindata.store');
    Route::post('header', [ApiController::class, 'postHeader'])->name('header.store');
    Route::post('footer', [ApiController::class, 'postFooter'])->name('footer.store');
    Route::post('trust', [ApiController::class, 'postTrust'])->name('trust.store');
    Route::post('mainfiles', [ApiController::class, 'postMainfiles'])->name('mainfiles.store');

    Route::get('agreementsections', [ApiController::class, 'agreementsections'])->name('agreementsections');

    Route::get('friendfooter', [ApiController::class, 'friendfooter'])->name('friendfooter');
    Route::post('createfooterfriend', [ApiController::class, 'postCreatefooterfriend'])->name('createfooterfriend.store');

    Route::post('editfooterfriend', [ApiController::class, 'postEditfooterfriend'])->name('editfooterfriend.store');
    Route::post('delfriendfooter', [ApiController::class, 'postDelfriendfooter'])->name('delfriendfooter.store');

    Route::get('clientreview', [ApiController::class, 'clientreview'])->name('clientreview');
    Route::post('editreview', [ApiController::class, 'postEditreview'])->name('editreview.store');

    Route::post('createreview', [ApiController::class, 'postCreatereview'])->name('createreview.store');
    Route::post('delreview', [ApiController::class, 'postDelreview'])->name('delreview.store');

    Route::get('customersatisfaction', [ApiController::class, 'customersatisfaction'])->name('customersatisfaction');
    Route::post('customersatisfaction', [ApiController::class, 'postCustomersatisfaction'])->name('customersatisfaction.store');

    Route::post('response', [ApiController::class, 'postResponse'])->name('response.store');
    Route::post('updateresponse', [ApiController::class, 'postUpdateresponse'])->name('updateresponse.store');
    Route::post('genfile', [ApiController::class, 'postGenfile'])->name('genfile.store');
    Route::post('createcrmadmin', [ApiController::class, 'postCreatecrmadmin'])->name('createcrmadmin.store');
    Route::post('changeaccess', [ApiController::class, 'postChangeaccess'])->name('changeaccess.store');
    Route::post('deletecrmadmin', [ApiController::class, 'postDeletecrmadmin'])->name('deletecrmadmin.store');
    Route::post('unblockcrmadmin', [ApiController::class, 'postUnblockcrmadmin'])->name('unblockcrmadmin.store');
    Route::get('crmadmins', [ApiController::class, 'crmadmins'])->name('crmadmins');

    Route::get('emaildetails', [ApiController::class, 'emaildetails'])->name('emaildetails');
    Route::post('createemaildetails', [ApiController::class, 'postCreateemaildetails'])->name('createemaildetails.store');

    Route::post('newuser', [ApiController::class, 'postNewuser'])->name('newuser.store');
    Route::post('addemails', [ApiController::class, 'postAddemails'])->name('addemails.store');
    Route::post('delemails', [ApiController::class, 'postDelemails'])->name('delemails.store');
    Route::post('changeemailaccess', [ApiController::class, 'postChangeemailaccess'])->name('changeemailaccess.store');
    Route::post('removeuser', [ApiController::class, 'postRemoveuser'])->name('removeuser.store');
    Route::post('edituser', [ApiController::class, 'postEdituser'])->name('edituser.store');
// });
