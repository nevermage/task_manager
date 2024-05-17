<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function create()
    {
        $project = new Project();
        $project->title = 'Aquarel';
        $project->abbreviation = 'AQ';
        $project->creator_id = DB::table('users')->first()->id;
        $project->save();

        return $project->toArray();
    }
}
