<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $table = 'priority';

    public static function getAsKeyValueArray(): array
    {
        $priorities = [];

        foreach (Priority::all() as $priority) {
            $priorities[$priority->id] = $priority->title;
        }

        return $priorities;
    }
}
