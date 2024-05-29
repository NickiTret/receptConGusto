<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Index\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AjaxController extends Controller
{
    //

    public function delete() {
        Artisan::call('cache:clear');
        return redirect()->action([IndexController::class, 'index']);
    }
}
