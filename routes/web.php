<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard']);
    // Route::get('/logout', [Controller::class, 'logout']);

    Route::get('/ajouter-utilisateur', [Controller::class, 'ajouterUtilisateur']);
    Route::get('/gerer-utilisateur', [Controller::class, 'gererUtilisateur'])->name('users');
    Route::post('/saveuser', [Controller::class, 'saveuser'])->name('saveuser');
    Route::delete('/deleteuser/{id}', [Controller::class, 'deleteuser'])->name('deleteuser');
    Route::get('/edituser/{id}', [Controller::class, 'edituser'])->name('edituser');
    Route::put('/updateuser', [Controller::class, 'updateuser'])->name('updateuser');

    Route::get('/ajouter-service', [Controller::class, 'ajouterService']);
    Route::get('/gerer-service', [Controller::class, 'gererService'])->name('services');
    Route::post('/saveservice', [Controller::class, 'saveservice'])->name('saveservice');
    Route::delete('/deleteservice/{id}', [Controller::class, 'deleteservice'])->name('deleteservice');
    Route::put('/updateservice', [Controller::class, 'updateservice'])->name('updateservice');
    Route::get('/editservice/{id}', [Controller::class, 'editservice'])->name('editservice');

    Route::get('/ajouter-facture', [Controller::class, 'ajouterFacture']);
    Route::get('/gerer-facture', [Controller::class, 'gererFacture'])->name('factures');
    Route::post('/savefacture', [Controller::class, 'saveFacture'])->name('savefacture');
    Route::delete('/deletefacture/{id}', [Controller::class, 'deleteFacture'])->name('deletefacture');
    Route::get('/mes-factures', [Controller::class, 'gererMesFacture'])->name('mes_factures');
    Route::get('/editfacture/{id}', [Controller::class, 'editfacture'])->name('editfacture');
    Route::put('/updatefacture', [Controller::class, 'updatefacture'])->name('updatefacture');

    Route::get('/facture/{id}/addligne', [Controller::class, 'addLignesFacture'])->name('addlignesfacture');
    Route::post('/facture/{id}/lignes', [Controller::class, 'saveLignesFacture'])->name('savelignesfacture');
    Route::get('/facture/{id}/lignes', [Controller::class, 'viewLignesFacture'])->name('viewlignesfacture');
    Route::delete('/ligne-facture/{id}', [Controller::class, 'deleteLigneFacture'])->name('deletelignefacture');
    Route::get('/facture/{id}/view', [Controller::class, 'viewFacture'])->name('viewfacture');
    Route::get('facture/{id}/pdf', [Controller::class, 'generatePDF'])->name('facture.pdf');
    Route::get('/editlignefacture/{id}', [Controller::class, 'editLigneFacture'])->name('editlignefacture');
    Route::put('/updatelignefacture/{id}', [Controller::class, 'updateLigneFacture'])->name('updatelignefacture');

    Route::get('payement/{id}/montant/{montant}', [Controller::class, 'payementPage'])->name('payementpage');
    Route::get('pay/{id}/{montant}', [Controller::class, 'savePayement'])->name('savepayement');
    Route::get('payements', [Controller::class, 'payements'])->name('payements');

});
