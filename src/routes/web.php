<?php

use Illuminate\Support\Facades\Route;
use  Xoxoday\Fileverify\Http\Controller\FileVerifyController;

Route::group(['middleware' => ['web']], function () {

Route::post('/verifyFile', [FileVerifyController::class, 'verifyFile']);

});
