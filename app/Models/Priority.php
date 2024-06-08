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

    public static function getColorByPriority(int $id)
    {
        switch ($id) {
            case 1:
                return '#C26D62FF';
            case 2:
                return '#C2A062FF';
            case 3:
                return '#BFC262FF';
            case 4:
                return '#88C262FF';
            default:
                return '#888888';
        }
    }
}
