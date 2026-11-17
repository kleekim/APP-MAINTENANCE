<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{
    use HasFactory;

    protected $table = 'sms_logs'; 

    protected $fillable = [
        'to',
        'message',
        'status',
        'provider',
        'response',
        'sent_at',
    ];

    protected $casts = [
        'response' => 'json',
        'sent_at' => 'datetime',
    ];

    public static function logSms(string $to, string $message, string $status = 'sent', string $provider = 'local', ?array $response = null): void
    {
        self::create([
            'to' => $to,
            'message' => $message,
            'status' => $status,
            'provider' => $provider,
            'response' => $response,
            'sent_at' => now(),
        ]);
    }
}
