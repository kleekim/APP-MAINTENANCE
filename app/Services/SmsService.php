<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

 
class SmsService
{
    /**
     * Send SMS message.
     *
     * @param  string  $phoneNumber
     * @param  string  $message
     * @return bool
     */
    public function send(string $phoneNumber, string $message): bool
    {
        $provider = config('services.sms.provider', 'twilio');

        return match ($provider) {
            'twilio' => $this->sendViaTwilio($phoneNumber, $message),
            'vonage' => $this->sendViaVonage($phoneNumber, $message),
            'http' => $this->sendViaHttp($phoneNumber, $message),
            'local' => $this->sendViaLocal($phoneNumber, $message),
            'log' => $this->sendViaLog($phoneNumber, $message),
            default => $this->sendViaLocal($phoneNumber, $message),
        };
    }

    /**
     * Send SMS via Twilio.
     *
     * @param  string  $phoneNumber
     * @param  string  $message
     * @return bool
     */
    protected function sendViaTwilio(string $phoneNumber, string $message): bool
    {
        $accountSid = config('services.sms.twilio.account_sid');
        $authToken = config('services.sms.twilio.auth_token');
        $from = config('services.sms.twilio.from');

        if (! $accountSid || ! $authToken || ! $from) {
            Log::warning('Twilio SMS credentials not configured, falling back to log');
            return $this->sendViaLog($phoneNumber, $message);
        }

        try {
            $response = Http::withBasicAuth($accountSid, $authToken)
                ->asForm()
                ->post("https://api.twilio.com/2010-04-01/Accounts/{$accountSid}/Messages.json", [
                    'From' => $from,
                    'To' => $phoneNumber,
                    'Body' => $message,
                ]);

            if ($response->successful()) {
                Log::info('SMS sent via Twilio', ['to' => $phoneNumber]);
                return true;
            }

            Log::error('Twilio SMS failed', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Twilio SMS exception', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Send SMS via Vonage (Nexmo).
     *
     * @param  string  $phoneNumber
     * @param  string  $message
     * @return bool
     */
    protected function sendViaVonage(string $phoneNumber, string $message): bool
    {
        $apiKey = config('services.sms.vonage.key');
        $apiSecret = config('services.sms.vonage.secret');
        $from = config('services.sms.vonage.from');

        if (! $apiKey || ! $apiSecret || ! $from) {
            Log::warning('Vonage SMS credentials not configured, falling back to log');
            return $this->sendViaLog($phoneNumber, $message);
        }

        try {
            $response = Http::withBasicAuth($apiKey, $apiSecret)
                ->post('https://rest.nexmo.com/sms/json', [
                    'from' => $from,
                    'to' => $phoneNumber,
                    'text' => $message,
                ]);

            if ($response->successful() && $response->json('messages.0.status') === '0') {
                Log::info('SMS sent via Vonage', ['to' => $phoneNumber]);
                return true;
            }

            Log::error('Vonage SMS failed', [
                'response' => $response->json(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Vonage SMS exception', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Send SMS via HTTP endpoint (custom provider).
     *
     * @param  string  $phoneNumber
     * @param  string  $message
     * @return bool
     */
    protected function sendViaHttp(string $phoneNumber, string $message): bool
    {
        $url = config('services.sms.http.url');
        $method = config('services.sms.http.method', 'POST');
        $headers = config('services.sms.http.headers', []);
        $body = config('services.sms.http.body_template');

        if (! $url) {
            Log::warning('HTTP SMS URL not configured, falling back to log');
            return $this->sendViaLog($phoneNumber, $message);
        }

        try {
            $request = Http::withHeaders($headers);

            if ($body) {
                $body = str_replace(['{phone}', '{message}'], [$phoneNumber, $message], $body);
                $data = json_decode($body, true) ?? ['phone' => $phoneNumber, 'message' => $message];
            } else {
                $data = ['phone' => $phoneNumber, 'message' => $message];
            }

            $response = $request->send($method, $url, $data);

            if ($response->successful()) {
                Log::info('SMS sent via HTTP', ['to' => $phoneNumber]);
                return true;
            }

            Log::error('HTTP SMS failed', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('HTTP SMS exception', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Log SMS message (for development/testing).
     *
     * @param  string  $phoneNumber
     * @param  string  $message
     * @return bool
     */
    protected function sendViaLog(string $phoneNumber, string $message): bool
    {
        Log::info('SMS (logged)', [
            'to' => $phoneNumber,
            'message' => $message,
        ]);

        return true;
    }

    /**
     * Send SMS via local database (development/testing).
     *
     * @param  string  $phoneNumber
     * @param  string  $message
     * @return bool
     */
    protected function sendViaLocal(string $phoneNumber, string $message): bool
    {
        try {
            \App\Models\SmsLog::logSms($phoneNumber, $message, 'sent', 'local');
            Log::info('SMS logged locally', ['to' => $phoneNumber]);
            return true;
        } catch (\Exception $e) {
            Log::error('Local SMS log error: ' . $e->getMessage());
            return false;
        }
    }
}
