<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendFeedbackRequest;
use App\Mail\SendFeedback;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendFeedback(SendFeedbackRequest $request): JsonResponse
    {
        try {
            $data = $request->all();

            $mail = new SendFeedback($data);
            Mail::to(env('MAIL_USERNAME'))->send($mail);
            return response()->json([
                'message' => 'Обращение отправлено, мы ответим Вам в течении пяти рабочих дней',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Ошибка, попробуйте снова',
            ], 400);
        }
    }
}
