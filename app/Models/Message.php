<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'contenu',
        'read_at',
        'deleted_by_sender_at',
        'deleted_by_receiver_at',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function isVisibleFor(int $userId): bool
    {
        if ($this->sender_id === $userId && $this->deleted_by_sender_at) return false;
        if ($this->receiver_id === $userId && $this->deleted_by_receiver_at) return false;
        return true;
    }
}