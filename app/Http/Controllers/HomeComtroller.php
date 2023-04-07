<?php

namespace App\Http\Controllers;

use App\Helpers\DateTimeHelper;
use App\Models\Calendar;
use App\Models\Conge;
use App\Models\Connexion;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use function Termwind\ValueObjects\p;

class HomeComtroller extends Controller
{
    public function dashboard(Request $request)
    {
        if (!is_null($request->get('month'))) {
            $month = $request->get('month');
            $year_ = $request->get('year');
            $year = substr("".$request->get('year'),-2);
        } else {
            $date_start = date("Y-m-d");
            $day = new \DateTime($date_start);
            $month = $day->format('m');
            $year = $day->format('y');
            $year_ = $day->format('Y');
        }
        $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $calandars=[];
        $periodes=Periode::all();
        //dump($year);

        for ($i=1;$i<=$number;$i++){
            $lists=[];
            $date_jour = date('Y-m-d', mktime(0, 0, 0, $month, $i, $year));
            foreach ($periodes as $item){
                $list_=Calendar::query()->where('date_reservation','=',$date_jour)
                    ->where('periode_id','=',$item->id)
                    ->with(['periode','user'])->get();
                $ferie=Conge::query()->where('date_conge','=',$date_jour)
                    ->where('periode_id','=',$item->id)->first();
                $lists[]=[
                    'is_conge'=>is_null($ferie)?false:true,
                    'periode_id'=>$item->id,
                    'list_calendars'=>$list_
                ];
            }
            $id_var = getdate(mktime(1, 1, 1, $month, $i, $year));
            $calandars[]=[
                'calandar_periodes'=>$lists,
                'day_string'=>DateTimeHelper::getDayByNumber($id_var['wday']),
                "day"=>date('Y-m-d', mktime(0, 0, 0, $month, $i, $year))
            ];
        }
        return view('pages.dashboard',[
            'calandars'=>$calandars,
            'periodes'=>$periodes,
            'year'=>$year_,'moments'=>[
              'next'=>DateTimeHelper::getNextMonth($month,$year_),
                'previous'=>DateTimeHelper::getPreviousMonth($month,$year_),
            ],
            'current_month_int'=>$month,
            'current_month'=>DateTimeHelper::getMonthByNumber($month)]);
    }
    public function saveCalendar(Request $request){
        $user=Auth()->user()->id;
        $periode=$request->get('periode');
        $jour=$request->get('date_reservation');
        $calandar=Calendar::query()->where('date_reservation','=',$jour)
            ->where('periode_id','=',$periode)
            ->where('user_id','=',$user)->first();
        if (is_null($calandar)){
            Calendar::create([
                'date_creation'=>date('Y-m-d'),
                'date_reservation'=>$jour,
                'user_id'=>$user,
                'periode_id'=>$periode,
                'multi'=>0,
                'confirmed'=>0,
            ]);
        }
        return redirect()->route('dashboard',['month'=>$request->get('month'),'year'=>$request->get('year')]);
    }
    public function deleteCalandar(Request $request){
        $user=Auth()->user()->id;
        $periode=$request->get('periode');
        $jour=$request->get('date_reservation');
        $calandar=Calendar::query()->where('date_reservation','=',$jour)
            ->where('periode_id','=',$periode)
            ->where('user_id','=',$user)->first();
        if (!is_null($calandar)){
            //die();
            $calandar->delete();
        }
        return redirect()->route('dashboard',['month'=>$request->get('month'),'year'=>$request->get('year')]);
    }
    public function conge(Request $request)
    {
        if ($request->method()=="POST"){
            Conge::create([
                "date_conge" =>$request->get('date_conge'),
                "periode_id" =>$request->get('periode_id'),
            ]);
        }
        $conges=Conge::all();
        $periodes=Periode::all();
        return view('pages.conge',['conges'=>$conges,'periodes'=>$periodes]);
    }
    public function periode(Request $request)
    {
        if ($request->method()=="POST"){
            $periode=new Periode();
            $periode->heure_debut =$request->get('heure_debut');
            $periode->heure_fin =$request->get('heure_fin');
           // $periode->save();
            $b_ool = $periode->save();
            if ($b_ool) {
                return redirect()->route('periode',[])->withSuccess(__('Save success', ['name' => __('users.store')]));
            } else {
                return redirect()->route('periode',[])->withErrors(__('update', ['name' => __('users.store')]));
            }
        }
        $users=Periode::all();
        return view('pages.periode',['periodes'=>$users]);
    }
    public function connexion()
    {
        $users=Connexion::all();
        return view('pages.connexions',['connexions'=>$users]);
    }
    public function users()
    {
        $users=User::all();
        return view('pages.users',['users'=>$users]);
    }
    public function conge_edit(Request $request,$id)
    {
        $conge=Conge::query()->find($id);
        $periodes=Periode::all();
        if ($request->method()=="POST"){
            $b_ool= $conge->update([
                'heure_debut'=>$request->heure_debut,
                'heure_fin'=>$request->heure_fin,
            ]);
            if ($b_ool) {
                return redirect()->route('conge',[])->withSuccess(__('Edit success', ['name' => __('users.store')]));
            } else {
                return redirect()->route('conge',[])->withErrors(__('Edit error', ['name' => __('users.store')]));
            }
        }
        return view('pages.edit.conge',['periodes'=>$periodes,'conge'=>$conge]);

    }
    public function periode_edit(Request $request,$id)
    {
        $periode=Periode::query()->find($id);
        if ($request->method()=="POST"){
        $b_ool= $periode->update([
            'heure_debut'=>$request->heure_debut,
            'heure_fin'=>$request->heure_fin,
        ]);
        if ($b_ool) {
            return redirect()->route('periode',[])->withSuccess(__('Delete success', ['name' => __('users.store')]));
        } else {
            return redirect()->route('periode',[])->withErrors(__('Delete error', ['name' => __('users.store')]));
        }
        }
        return view('pages.edit.periode',['periode'=>$periode]);

    }
    public function delete_periode(Request $request)
    {
        $periode=Periode::query()->find($request->get('item'));
        $b_ool= $periode->delete();
        return response()->json(['data' => $b_ool, 'status' => true]);
    }
    public function delete_conge(Request $request)
    {
        $conge=Conge::query()->find($request->get('item'));
        $b_ool= $conge->delete();
        return response()->json(['data' => $b_ool, 'status' => true]);

    }
}
