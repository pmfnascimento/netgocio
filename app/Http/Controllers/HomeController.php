<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\League;
use App\Models\Player;
use App\Models\Season;
use App\Models\Squard;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
    
        return view('home');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {

            $league = $request->league;
            $season = $request->season;
            $rounds = $request->rounds;
            $data = DB::table('rounds')
            ->join('standings', 'standings.round_id', '=', 'rounds.id')
            ->where([
                ['standings.round_id', '=', $rounds],

            ])->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }       
    }
    
    public function getLeagues()
    {
        $leagues = League::all();
        return response()->json(['leagues' => $leagues]);
    }

    public function getSeasons(Request $request)
    {
        $season = Season::where('league_id','=',$request->league)->get();
        return response()->json(['season' => $season]);
    }

    public function getRounds(Request $request)
    {
        $rounds = Round::where('season_id', '=', $request->season)->get();
        return response()->json(['rounds' => $rounds]);
    }

    public function getTeams(Request $request)
    {
   
        $teams = DB::table('standings')
        ->join('teams', 'teams.id', '=', 'standings.team_id')
        ->join('players', 'players.team_id', '=', 'teams.id') 
        ->where([
            ['standings.team_id', '=', $request->id],
            ['standings.round_id', '=', $request->rounds],
            ['teams.season_id', '=', $request->season]
            ])
            ->groupBy('players.player_id')->get();

        $team = DB::table('teams')
        ->where('id', '=', $request->id)
        ->where('season_id', '=', $request->season)
        ->groupBy('teams.season_id')
        ->get();

        return response()->json(['status' => 'success', 'players' => $teams, 'team' => $team]);
    }

    public function getPlayer(Request $request)
    {       
        $player = DB::table('players')->where('player_id','=', $request->id)->get();
        $statics = Squard::where('player_id','=', $request->id)->get();
        return response()->json(['status' => 'success', 'player' => $player, 'statics' => $statics]);
    }
}
