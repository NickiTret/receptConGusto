<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AjaxController extends Controller
{
    //

    public function delete()
    {
        $exitCode = Artisan::call('cache:clear');
        if ($exitCode === 0) {
            return redirect()->action([MainController::class, 'index']);
        } else {
            return back()->withErrors('Ошибка при сбросе кеша.');
        }
    }
}
