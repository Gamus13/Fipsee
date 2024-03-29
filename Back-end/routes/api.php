<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
// use App\Models\Fundraising;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InfosUserController;
use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgressBarController;
// use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use App\Http\Controllers\Fundraising;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
--------------------------------------------------------------------------------
    API ROUTES AUTHENTIFICATION PROFIL: porteur de projet
--------------------------------------------------------------------------------
*/

// route pour l'inscription d'un utilisateur
Route::post('/register', [AuthController::class, 'register']);

// route pour la connexion d'un utilisateur

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // route pour deconnecter l'utilisateur

    Route::post('/logout', [AuthController::class, 'logout']);

    //route pour recuperer les information de l'utilisateur connceter

    Route::get('/user', [AuthController::class, 'user']);

    // Route::get('/products/{productId}', [ProductController::class, 'showProductForLoggedInUser']);

});


// Route::get('/api/user', [UserController::class, 'getUser']);

// cette route c'est pour recuerer le token de laravel qui cause le csrf mismatch

// Route::get('/csrf-token', function () {
//     return csrf_token();
// });


/*
-----------------------------------------------------------------------------------------
    API ROUTES POUR LE PROFIL : INVESTISSEURS
------------------------------------------------------------------------------------------
*/
// route pour l'authentification d'un profil investisseur

Route::post('/register/investor', [AuthController::class, 'registerInvestor']);

Route::post('/login/investor', [AuthController::class, 'logins']);
Route::get('/userinvestisseur', [AuthController::class, 'userinvest'])->middleware('auth:sanctum');



/*
---------------------------------------------------------------------------------------------
    API ROUTES POUR LE SECOND FORMULAIRE : PORTEURS DE PROJETS
---------------------------------------------------------------------------------------------
*/

Route::get('/infos-users/{id}', [InfosUserController::class, 'show']);

// route pour  retourner les informations de infos_user a partir de user_id
Route::get('/users/{user_id}', [InfosUserController::class, 'sortUsersByUserId']);
// route pour les methodes post et get
Route::resource('infosUser',InfosUserController::class);


// route pour la methode update
Route::post('infosUser/{infosUser}', [InfosUserController::class, 'update']);

// route pour la methode delete
Route::delete('infosUser/{infosUser}', [InfosUserController::class, 'destroy']);

/*
----------------------------    --------------------------------------------------------------------
    API ROUTES POUR LES SUIVIE DES PROFILS : PORTEURS DE PROJETS OU INVESTISSEURS
------------------------------------------------------------------------------------------------
*/
// Route::post('infosUser/{infosUser}', [UserFollowController::class, 'follow']);
Route::get('/api/users/{userId}', [UserFollowController::class, 'following']);

Route::post('/api/users/{userId}', [UserFollowController::class, 'unfollow']);
/*
------------------------------------------------------------------------------------------------
    API ROUTES POUR LA LOGIQUE D'INVESTISSEMENT DANS UN PROJET
------------------------------------------------------------------------------------------------
*/

// Route pour tous afficher tous les payements
Route::get('payment', [PaymentController::class, 'index']);

// Route pour afficher les investisseurs en fonction de id_projet
Route::get('/payments/{id_product}', [PaymentController::class, 'indexByProductId']);

// Route pour afficher la sum des levee de fonds et des investisseur en fonction de leur id
Route::get('/payments/sum-and-count/{id_product}', [PaymentController::class, 'calculateSumAndCountByProductId']);

// Route pour effectuer des investissements
Route::post('charge', [PaymentController::class, 'charge']);

/*
------------------------------------------------------------------------------------------------
    API ROUTES POUR LA LOGIQUE DE BARRE DE PROGRESSION
------------------------------------------------------------------------------------------------
*/

// Route pour afficher le montant collecter par projet

Route::get('/projects/{projectId}/current-amount', [ProgressBarController::class, 'getCurrentAmount']);

// Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::get('/change-password', [App\Http\Controllers\AuthController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\AuthController::class, 'updatePassword'])->name('update-password');
// Route::get('change-password', 'ChangePasswordController@index')->name('change-password.index');

// Route::post('change-password', 'ChangePasswordController@store')->name('change-password.store');



// route pour ajouter un projet a la BD
Route::post('/products', [ProductController::class, 'store']);

Route::put('/api/products/{productId}', [ProductController::class, 'put']);
// route pour recuperer tous les projet de la BD
    Route::get('/products', [ProductController::class, 'index']);

// route pour filtrer  les projets de la BD en fonction de leur status
Route::get('/products/filter', [ProductController::class, 'filterByStatus']);

// route pour recuperer les informations de chaques id de la BD
Route::get('/products/{product}', [ProductController::class, 'show']);

// Route::put('/products/{product}', [ProductController::class, 'update']);
// Route::put('/products/{product}', 'ProductController@update');

// Route pour compter le nombre de projet qui appartient a un utilisateur
Route::get('/products/count/{user}', [ProductController::class, 'countproductsByUserId']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);


Route::get('users', [AuthController::class, 'index']); // tout d'abord je creer la route qui va sera appeller dans ma fonctionnalites



Route::post('upload',[NotificationController::class,'saveImage']);

Route::get('list',[NotificationController::class,'getNotificationList']);

Route::get('delete/{id}',[NotificationController::class,'deleteImg']);


Route::get('getLatestRow',[NotificationController::class,'getUnreadNotificationCount']);

Route::post('updateNotification',[NotificationController::class,'markNotificationAsRead']);
