<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Создание экземпляра класса и отправка сообщения
        $contactMail = new ContactFormMail($request->all());
        $contactMail->sendMessage('tretjakov.nickit@yandex.ru'); // Укажите адрес получателя

        return back()->with('success', 'Ваше сообщение отправлено!');
    }
}
