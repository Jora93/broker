<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispatcher;
use Illuminate\Validation\Rule;

class DispatcherController extends Controller
{

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'adminAndSupport']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('dispatcher.index', ['dispatchers' => Dispatcher::orderBy('created_at', 'desc')->paginate(25)], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dispatcher.create');
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
            'full_name' => ['required', 'string', 'max:255', 'unique:dispatchers,full_name'],
            'email' => ['required', 'string', 'max:255', 'unique:dispatchers,email'],
        ]);
        $data = $request->all();
        Dispatcher::create($data);

        return redirect('dispatchers')->with('success', 'Dispatcher Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Dispatcher $dispatcher
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispatcher $dispatcher)
    {
        return response()->view('dispatcher.edit', ['dispatcher' => $dispatcher], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Dispatcher          $dispatcher
     *
     * @return void
     */
    public function update(Request $request, Dispatcher $dispatcher)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', 'unique:dispatchers,full_name,'.$dispatcher->id],
            'email' => ['required', 'string', 'max:255', 'unique:dispatchers,email,'.$dispatcher->id],
        ]);
        $data = $request->all();
        $dispatcher->update($data);

        return redirect('dispatchers')->with('success', 'Dispatcher Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $dispatchers = Dispatcher::orderBy('created_at', 'desc');

        if (isset($data['full_name']) && !is_null($data['full_name'])) {
            $dispatchers->where('full_name', 'LIKE', "%{$data['full_name']}%");
        }
        if (isset($data['email']) && !is_null($data['email'])) {
            $dispatchers->where('email', 'LIKE', "%{$data['email']}%");
        }

        $dispatchers = $dispatchers->paginate($data['paginate']);

        return view('dispatcher.index', compact('dispatchers', 'data'));
    }

}
