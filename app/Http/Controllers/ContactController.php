<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Simple spam protection: check for honeypot field
        if ($request->filled('website')) {
            return response()->json([
                'success' => true,
                'message' => 'تم إرسال رسالتك بنجاح'
            ]);
        }

        // Validation with Arabic error messages
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب أن يكون نصاً',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرفاً',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.max' => 'البريد الإلكتروني يجب ألا يتجاوز 255 حرفاً',
            'message.required' => 'الرسالة مطلوبة',
            'message.string' => 'الرسالة يجب أن تكون نصاً',
            'message.max' => 'الرسالة يجب ألا تتجاوز 5000 حرف',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Send email
            $recipientEmail = env('CONTACT_EMAIL', 'info@domain.com');
            Mail::to($recipientEmail)->send(new ContactMail(
                $request->name,
                $request->email,
                $request->message
            ));

            return response()->json([
                'success' => true,
                'message' => 'شكراً لك! تم إرسال رسالتك بنجاح وسنرد عليك قريباً.'
            ]);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Mail sending failed: ' . $e->getMessage());
            \Log::error('Mail config: ' . json_encode([
                'mailer' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'username' => config('mail.mailers.smtp.username'),
                'encryption' => config('mail.mailers.smtp.encryption'),
            ]));
            
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء إرسال الرسالة: ' . $e->getMessage()
            ], 500);
        }
    }
}

