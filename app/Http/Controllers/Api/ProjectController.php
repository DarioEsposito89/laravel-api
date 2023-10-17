<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(["type", "technologies"])->paginate(3);

        return response()->json($projects);
    }

    public function show($slug){
        $project = Project::where("slug", $slug)->with("type", "technologies")->firstOrFail();

        return response()->json($project);
    }
}
