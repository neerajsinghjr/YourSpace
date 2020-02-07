<?php

namespace App\Http\Controllers;

use Session;
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::all();

        return view('channels.index')->with('channels', $channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $channel  = new Channel;

        $this->validate($request, [
            'title' => 'required|max:120',
        ]);

        $channel->title = $request->title;
        $channel->slug = str_slug($request->title);
        
        if($channel->save()){

            Session::flash('success', $request->title." channel is created Successfully.");
            return redirect()->route('home');

        }else {

            Session::flash('error', "Something unexpected occured.");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $channel = Channel::find($id)->title;
        
        $discussions = Channel::find($id)->discussions;
     
        if($channel && $discussions->count() > 0) {

            return view('channels.index', [
                'channel' => $channel,
                'discussions' => $discussions,
            ]);    

        } else {

            return view('errors.error', [
                'message' => 'It might possible that specific channel doesnt not have discussions.',
            ]);
        }

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::find($id);
        return view('channels.edit')->with('channel', $channel);
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
        $channel = Channel::find($id);

        $this->validate($request, [
            'title' => 'required|max:20',
        ]);

        $channel->title = $request->title;

        if($channel->save()) {

            Session::flash('success', $request->title." channel updated Successfully.");
            return redirect()->route('channels.index');

        }else {

            Session::flash('error', "Something unexpected occured.");
            return redirect()->back();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        // dd($id);
        $title = Channel::find($id)->title;
        $status = Channel::find($id)->delete();
        // dd($status);
        if($status) {

            Session::flash('info', $title." channel deleted Successfully.");
            return redirect()->route('channels.index');   

        }else {

            Session::flash('error', "Something unexpected occured.");
            return redirect()->back();

        }
    }
}
