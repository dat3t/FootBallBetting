<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Battle;
use App\User_Battle;
use App\User;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $battles = Battle::all();
        return 1;
    }

    public function saveBattleInfo(Request $request)
    {
        $battle = new Battle;
        $battle->hometeam = $request->input('home_team');
        $battle->guest = $request->input('guest');
        $battle->start_at = $request->input('start_at');
        $battle->end_at = $request->input('end_at');
        $battle->bet_deadline = $request->input('betting_deadline');
        $battle->win = $request->input('win');
        $battle->lose = $request->input('lose');
        $battle->draw = $request->input('draw');
        $battle->hometeam_score = -1;
        $battle->guest_score = -1;
        $battle->isPublished = false;
        $battle->save();
        return redirect('home');
    }

    public function saveBattleScore(Request $request, $id)
    {
        $battle = Battle::find($id);
        $battle->hometeam_score = $request->input('home_team_score');
        $battle->guest_score = $request->input('guest_score');
        $battle->save();

        $bettings = DB::table('users')
        ->join('user_battle', 'users.id', '=', 'user_battle.user_id')
        ->join("battles",'user_battle.battle_id','=','battles.id')
        ->where('battle_id','=',$id)
        ->select('users.*','user_battle.*','battles.*')
        ->get();

        foreach ($bettings as $betting) {
            $result_money = 0;

            if($betting->hometeam_score>$betting->guest_score){
                $result_money = $betting->win_money*$betting->win;
            }
           if($betting->hometeam_score<$betting->guest_score){
              $result_money = $betting->lose_money*$betting->lose;
            }
           if($betting->hometeam_score==$betting->guest_score){
              $result_money = $betting->draw_money*$betting->draw;
            }

            $user = User::find($betting->user_id);
            $user->coin += $result_money;
            $user->save();
        }

        return redirect('home');
    }

    public function publishBattle(Request $request, $id)
    {
        $battle = Battle::find($id);
        $battle->isPublished = true;
        $battle->save();
        return redirect('home');
    }

    public function destroy(Request $request,$id){
    $battle = Battle::find($id);
    $battle->delete();
    return redirect('/home');
    }

    public function saveEditBattle(Request $request, $id){
    $battle = Battle::find($id);
    $battle->hometeam   = $request->input('home_team_edit');
    $battle->guest      = $request->input('guest_edit');
    $battle->end_at         = $request->input('end_at_edit');
    $battle->bet_deadline   = $request->input('betting_deadline_edit');
    $battle->win = $request->input('win_edit');
    $battle->lose = $request->input('lose_edit');
    $battle->draw = $request->input('draw_edit');
    $battle->save();

    return redirect('/home');
    }

    public function saveBetting(Request $request, $battle_id, $user_id){
    $betting = new User_Battle;
    $betting->battle_id = $battle_id;
    $betting->user_id = $user_id;
    $betting->win_money = $request->input('win_ratio');
    $betting->lose_money = $request->input('lose_ratio');
    $betting->draw_money = $request->input('draw_ratio');
    $betting->save();

    $user = User::find($user_id);
    $user->coin -= $request->input('win_ratio');
    $user->coin -= $request->input('lose_ratio');
    $user->coin -= $request->input('draw_ratio');
    $user->save();

    return redirect('/home');
    }

    public function getBattleInfo(Request $request){
     $id = $request->input('id');   
     // $betting = User_Battle::where('battle_id', 1)->get();
    $bettings = DB::table('users')
        ->join('user_battle', 'users.id', '=', 'user_battle.user_id')
        ->join("battles",'user_battle.battle_id','=','battles.id')
        ->where('battle_id','=',$id)
        ->select('users.*','user_battle.*','battles.*')
        ->get();

     return array('battle_ajax' => $bettings);

    }

    public function checkIfBeAbleToDelete(Request $request){
    $id = $request->input('id');   
    $bettings = User_Battle::find($id);
     return array('bet_number' => count($bettings));
    }

    public function getUserHistory(Request $request){
    $user_id = $request->input('user_id'); 
    $bettings = DB::table('users')
        ->join('user_battle', 'users.id', '=', 'user_battle.user_id')
        ->join("battles",'user_battle.battle_id','=','battles.id')
       // ->where('user_battle.battle_id','=','battles.id')
        ->where('users.id','=',$user_id)
        ->select('users.*','user_battle.*','battles.*')
        ->get();

     return array('betting_ajax' => $bettings);
    }

    public function service(Request $request){
        $client = new Client();
        $res = $client->request('GET', 'http://localhost:8080/FootballBetting/app/webservice/server.php?getUser&format=json');
        $res = $client->request('GET', 'http://localhost:8000/home');

        return $res;
       // echo $res->getBody();
//        // "200"
//        echo $res->getHeader('content-type');
//        // 'application/json; charset=utf8'
//        echo $res->getBody();
    }
}
