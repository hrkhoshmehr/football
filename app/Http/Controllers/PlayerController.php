<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function create(Team $team , Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $player = $team->players()->create($request->all());

        return response()->json(['message' => 'player added.'], 200);
    }

    public function update(Player $player, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $player = $player->update($request->all());

        return response()->json(['message' => 'player updated!'], 200);
    }
}
