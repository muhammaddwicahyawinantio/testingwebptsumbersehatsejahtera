<?php

namespace App\Http\Controllers;

use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Models\ContactMessage;
use App\Models\User;
use Closure;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'g-recaptcha-response' => [
                'required',
                function (string $attribute, mixed $value, Closure $fail) use ($request) {
                    try {
                        $response = Http::asForm()
                            ->timeout(10)
                            ->post('https://www.google.com/recaptcha/api/siteverify', [
                                'secret'   => config('services.recaptcha.secret_key'),
                                'response' => $value,
                                'remoteip' => $request->ip(),
                            ]);
                    } catch (ConnectionException) {
                        $fail('Verifikasi reCAPTCHA tidak dapat dihubungi. Silakan coba lagi.');

                        return;
                    }

                    if (! $response->json('success')) {
                        $fail('Verifikasi reCAPTCHA gagal. Pastikan Anda mencentang kotak "I\'m not a robot".');
                    }
                },
            ],
        ], [
            'g-recaptcha-response.required' => 'Silakan centang kotak "I\'m not a robot" terlebih dahulu.',
        ]);

        // g-recaptcha-response bukan kolom database, jangan ikut disimpan
        unset($validated['g-recaptcha-response']);

        $pesan = ContactMessage::create($validated);

        // Kirim notifikasi database ke semua admin Filament
        foreach (User::all() as $recipient) {
            Notification::make()
                ->title('Pesan Baru: ' . $validated['subject'])
                ->body('Dari: ' . $validated['name'] . ' (' . $validated['email'] . ')')
                ->success()
                ->actions([
                    Action::make('Lihat')
                        ->button()
                        ->url(ContactMessageResource::getUrl('view', [
                            'record' => $pesan->getKey(),
                        ])),
                ])
                ->sendToDatabase($recipient);
        }

        return back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}