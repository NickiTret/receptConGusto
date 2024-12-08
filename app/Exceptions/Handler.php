<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Header;
use App\Models\Category;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function render($request, Throwable $exception) // Изменено на Throwable
    {
        if ($exception instanceof NotFoundHttpException) {
            // Получаем данные, которые хотите передать
            $headers = Header::all();
            $categories_menu = Category::orderBy('title')->get();
            $hasAcceptedCookies = Cookie::get('acceptCookie', false);

            // Возвращаем представление ошибки с переданными переменными
            return response()->view('errors.layout', [
                'headers' => $headers,
                'categories_menu' => $categories_menu,
                'hasAcceptedCookies' => $hasAcceptedCookies,
            ], 404);
        }

        return parent::render($request, $exception);
    }


}
