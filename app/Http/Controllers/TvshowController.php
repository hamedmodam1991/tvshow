<?php

namespace App\Http\Controllers;

use App\Tvshow;
use App;
use Illuminate\Http\Request;

class TvshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $tvshows = App\User::find($id)->Tvshow;


        return View("tvshow", ['tvshows' => $tvshows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tvcreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'season' => 'required',
            'episode' => 'required',
            'quote' => 'required',
        ]);
        $id = \Auth::user()->id;

        $tvshow = new Tvshow;

        $tvshow->name = $request->name;
        $tvshow->season = $request->season;
        $tvshow->episode = $request->episode;
        $tvshow->quote = $request->quote;
        $tvshow->user_id = $id;

        $tvshow->save();
        return redirect()->action('TvshowController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function show(Tvshow $tvshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tvshow = Tvshow::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();
        return view('tvupdate', compact('tvshow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'season' => 'required',
            'episode' => 'required',
            'quote' => 'required',
        ]);
        $tvshow = new Tvshow();
        $data['id'] = $id;
        $data['name'] = $request->name;
        $data['season'] = $request->season;
        $data['episode'] = $request->episode;
        $data['quote'] = $request->quote;
        $tvshow->updateTvshow($data);

        $id = \Auth::user()->id;
        $tvshows = App\User::find($id)->Tvshow;


        return View("tvshow", ['tvshows' => $tvshows]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Tvshow::find($id);
        $ticket->delete();
    }
}
