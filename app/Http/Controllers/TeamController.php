<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderByDesc('id')->get();

        return response()->json(['teams' => $teams], 200);
    }

    public function show(Team $team)
    {

        return response()->json(['team' => $team, 'players' => $players], 200);
    }

    public function create(Request $request)
    {
        $team = Team::create($request->all());

        return response()->json(['message' => 'Team Created.'], 200);
    }

}
