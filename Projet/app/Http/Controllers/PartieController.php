<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Parties;
use Illuminate\Support\Facades\Auth;

class PartieController extends Controller
{
    public function createPartie(Request $request)
    {



        $nouvellePartie = new Parties;
        $nouvellePartie->creator_id = 1;
        $nouvellePartie->max_players = $request->partie["max_players"];
        $nouvellePartie->is_public = filter_var($request->partie['is_public'], FILTER_VALIDATE_BOOLEAN);
        $nouvellePartie->save();

        return $nouvellePartie;
    }

    public function index()
    {
        return Parties::where('is_public', true)
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function destroy($id)
    {
        $parties = Parties::find($id);
        if ($parties) {
            $parties->delete();
            return response()->json(["La partie a été supprimé"]);
        }
        return response()->json(["La partie n'existe plus"]);

    }



}
;
