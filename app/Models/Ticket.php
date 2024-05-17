<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;

    public const int STATUS_READY_FOR_DEVELOPMENT = 1;
    public const int STATUS_IN_PROGRESS = 2;
    public const int STATUS_READY_FOR_TESTING = 3;
    public const int STATUS_TESTING = 4;
    public const int STATUS_READY_FOR_RELEASE = 5;

    public const array STATUSES = [
        self::STATUS_READY_FOR_DEVELOPMENT => 'Ready for development',
        self::STATUS_IN_PROGRESS => 'In progress',
        self::STATUS_READY_FOR_TESTING => 'Ready for testing',
        self::STATUS_TESTING => 'Testing',
        self::STATUS_READY_FOR_RELEASE => 'Ready for release',
    ] ;

    public const string NUMBER_SEPARATOR = '-';

    protected $table = 'ticket';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'assigned_user_id',
        'priority_id',
        'version_id',
    ];

    protected $casts = [
        'created_date',
        'updated_date',
    ];

    public static function getByNumber(string $number)
    {
        $id = str_contains($number, self::NUMBER_SEPARATOR)
            ? explode("-", $number)[1]
            : $number;

        return self::where('id', $id)->first();
    }
}
