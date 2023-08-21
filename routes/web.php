<?php

use App\Http\Controllers\CatigorieController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Test;
use App\Http\Controllers\useFormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use CMI\CmiClient;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('formations.index');
});

// Route::get('/home', function () {
//     return view('index');
// });

Route::get('/home', [homeController::class, 'index']);
Route::get('/meet', [homeController::class, 'meet']);

// Route::get('/meet', function () {
//     return view('meetings');
// });

Route::get('/meeting-details', function () {
    return view('meeting-details');
});
Route::get('/pay', function () {
    return view('payment_v2');
});
// Route::get('/{obj}', function ($obj) {
//     return redirect()->route('formations.index');
// });

Route::resource('etudiant',UsersController::class);

Route::resource('facture',factureController::class);

Route::resource('join',useFormController::class);

Route::get('/ma_formations', [UsersController::class, 'forms'])->name('users.forms');

Route::resource('catigorie',CatigorieController::class);

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
});

Route::get('/les_formations', [formationController::class, 'form'])->name('les_formations');


// Route::get('/redirect/{?id}', function ($id) {
//     return redirect()->route('etudiant.edit');
// })->middleware('auth');
Route::get('/join', function () {
    return view('join');
})->middleware('auth');

Route::get('/test', [Test::class, 'index']);
Route::resource('formations',formationController::class);
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
Route::get('stripe2', [UserController::class, 'pay']);
Route::get('/formation', [formationController::class, 'meet']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('process', function(Request $request)
{
    $base_url= config('app.url');
    $client = new CmiClient([
        'storekey' => '46486464', // STOREKEY
        'clientid' => '44698713', // CLIENTID
        'oid' => $request->cmd, // COMMAND ID IT MUST BE UNIQUE
        'shopurl' => $base_url, // SHOP URL FOR REDIRECTION
        'okUrl' => $base_url.'/okFail', // REDIRECTION AFTER SUCCEFFUL PAYMENT
        'failUrl' => $base_url.'/okFail', // REDIRECTION AFTER FAILED PAYMENT
        'email' => 'mehdi.rochdi@gmail.com', // YOUR EMAIL APPEAR IN CMI PLATEFORM
        'BillToName' => 'mehdi rochdi', // YOUR NAME APPEAR IN CMI PLATEFORM
        'BillToCompany' => 'company name', // YOUR COMPANY NAME APPEAR IN CMI PLATEFORM
        'BillToStreet12' => '100 rue adress', // YOUR ADDRESS APPEAR IN CMI PLATEFORM NOT REQUIRED
        'BillToCity' => 'casablanca', // YOUR CITY APPEAR IN CMI PLATEFORM NOT REQUIRED
        'BillToStateProv' => 'Maarif Casablanca', // YOUR STATE APPEAR IN CMI PLATEFORM NOT REQUIRED
        'BillToPostalCode' => '20230', // YOUR POSTAL CODE APPEAR IN CMI PLATEFORM NOT REQUIRED
        'BillToCountry' => '504', // YOUR COUNTRY APPEAR IN CMI PLATEFORM NOT REQUIRED (504=MA)
        'tel' => '0021201020304', // YOUR PHONE APPEAR IN CMI PLATEFORM NOT REQUIRED
        'amount' => $request->amount, // RETRIEVE AMOUNT WITH METHOD POST
        'CallbackURL' => $base_url.'/callback', // CALLBACK
    ]); 
    $client->redirect_post();
})->name('process');
Route::post('okFail',function(Request $request){
    dd($request->all());
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
