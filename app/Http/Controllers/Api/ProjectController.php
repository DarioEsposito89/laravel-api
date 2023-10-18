<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(["type", "technologies"])->paginate(10);

        return response()->json($projects);
    }

    public function show($slug){
        $project = Project::where("slug", $slug)->with("type", "technologies")->firstOrFail();

        if(!$project){
            error(404);
        }

        return response()->json($project);
    }
}
