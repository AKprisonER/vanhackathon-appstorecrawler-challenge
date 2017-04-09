<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use App\RankingEntry;
use Carbon\Carbon;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $googlePlayFreeRankingEntry = RankingEntry::where('type', '=', 'free')->whereHas('App', function($q){
            $q->where('os', '=', 'android');
        })->whereDate('created_at', '=', Carbon::today()->toDateString())->limit(10)->orderBy('position', 'asc')->with('app')->get();

        $appStoreFreeRankingEntry = RankingEntry::where('type', '=', 'free')->whereHas('App', function($q){
            $q->where('os', '=', 'ios');
        })->whereDate('created_at', '=', Carbon::today()->toDateString())->limit(10)->orderBy('position', 'asc')->with('app')->get();


        // dd($googlePlayFree);
        return view('apps.index', [
            'googlePlayFreeRankingEntry' => $googlePlayFreeRankingEntry,
            'appStoreFreeRankingEntry' => $appStoreFreeRankingEntry,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = App::findOrFail($id);
        return view('apps.show', compact('app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
