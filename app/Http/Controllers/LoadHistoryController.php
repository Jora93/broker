<?php

namespace App\Http\Controllers;

use App\Load;
use Illuminate\Http\Request;
use App\LoadHistory;

class LoadHistoryController
{

    /**
     * Display a listing of the resource.
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "load_id" => "required|exists:loads,id",
            "user_id"    => "required|exists:users,id",
            "info"       => "required|string"
        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//        $data = $request->all();
//        $LoadHistory = $this->LoadHistory->create($data);
//
//        return \Redirect::back()->with(['invoice' => $LoadHistory->invoice->with(['broker', 'histories'])->first()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\LoadHistory $LoadHistory
     *
     * @return void
     */
    public function show(LoadHistory $LoadHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\LoadHistory $LoadHistory
     *
     * @return void
     */
    public function edit(LoadHistory $LoadHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request          $request
     * @param \App\LoadHistory $LoadHistory
     *
     * @return void
     */
    public function update(Request $request, LoadHistory $LoadHistory)
    {
        $LoadHistory->update($request->all());
        $unconfirmedHistory = LoadHistory::where('load_id', $LoadHistory->load_id)->where('confirmed', false)->first();
        $changedLoadsExist = false;
        if (is_null($unconfirmedHistory)) {
            $LoadHistory->parent->update(['changed' => false]);
        }
        if (Load::where('changed', true)->first()) {
            $changedLoadsExist = true;
        }

        return response()->json(['success' => 'Load Created successfully', 'id' => $LoadHistory->id, 'changedLoadsExist' => $changedLoadsExist]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\LoadHistory $LoadHistory
     *
     * @return void
     */
    public function destroy(LoadHistory $LoadHistory)
    {
        //        $LoadHistory->delete();
        //        return redirect()->back();
    }
}
