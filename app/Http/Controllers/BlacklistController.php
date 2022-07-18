<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklist;
use Illuminate\Support\Facades\Validator;


class BlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        $list = Blacklist::where('company_id', $company_id)->orderBy('created_at', 'desc')->paginate(25);

        return View('black-list.index')->with(['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        return View('black-list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($company_id, Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "mc_number" => ['required'],
            "note" => ['required']
        ]);

        $data = $request->all();
        $data['company_id'] = $company_id;
        Blacklist::create($data);

        return redirect('/'.$company_id.'/black-list');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, $id)
    {
        Blacklist::destroy($id);

        return redirect('/'.$company_id.'/black-list');
    }


    public function search($company_id, Request $request)
    {
        $data = $request->all();
        $list = null;

        if (isset($data['name']) && !is_null($data['name'])) {
            $list = Blacklist::where('name', 'LIKE', "%{$data['name']}%");
        }

        if (isset($data['mc_number']) && !is_null($data['mc_number'])) {
            $list = Blacklist::where('mc_number', 'LIKE', "%{$data['mc_number']}%");
        }

        $list = $list->orderBy('created_at', 'desc')->paginate($data['paginate']);
        return view('black-list.index', compact('list', 'data'));

    }

    public function getList($company_id)
    {
        $list = Blacklist::where('company_id', $company_id)->orderBy('created_at', 'desc')->get();

        return response()->json($list);
    }
}
