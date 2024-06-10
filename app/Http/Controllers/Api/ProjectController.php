<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(3);
        if($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Projects not found'
            ]);
        }
    }

    public function show($id) {
        $project = Project::where('id', $id)->with('type', 'technologies')->first();
        if($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ]);
        }
        
    }
}
