<?php

namespace App\Http\Controllers;

use App\Models\Load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response as Download;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store($company_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "carrier_id"  => ['nullable','exists:carriers,id'],
            "custome_id"  => ['nullable', 'exists:customers,id'],
            "load_id"     => ['nullable', 'exists:loads,id'],
            "type"        => ['required'],
            "description" => ['nullable'],
            "file"        => ['required', 'file', 'max:5000', 'mimes:jpeg,png,gif,svg,pdf']
        ]);
        $data = $request->all();
        $data['company_id'] = $company_id;
        $data['user_id'] = Auth::user()->id;
        $fileName = $company_id.'/'.time().str_replace(' ', '_', $request->file->getClientOriginalName());
        Storage::disk('s3')->put($fileName, file_get_contents($data['file']), 'public');
        $data['name'] = $fileName;
        $document = Document::create($data);
        if (isset($data['load_id']) && $data['type'] == 'Notice of Assignment') {
            Load::find($data['load_id'])->update(['has_noa' => true]);
        }
        $document->user_email = Auth::user()->email;
        $document->file_path = env('AWS_STORAGE_URL').$fileName;

        return response()->json(['success' => $document]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param                          $company_id
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document            $document
     *
     * @return \Illuminate\Http\Response
     */
    public function update($company_id, Request $request, Document $document)
    {
        $validator = Validator::make($request->all(), [
            "carrier_id"  => ['nullable','exists:carriers,id'],
            "custome_id"  => ['nullable', 'exists:customers,id'],
            "load_id"     => ['nullable', 'exists:loads,id'],
            "type"        => ['required'],
            "description" => ['nullable'],
            "file"        => ['nullable', 'file', 'max:5000', 'mimes:jpeg,png,gif,svg,pdf']
        ]);
        $data = $request->all();
        $data['company_id'] = $company_id;
        if (isset($data['file'])) {
            $fileName =  $company_id.'/'.time().str_replace(' ', '_', $request->file->getClientOriginalName());
            Storage::disk('s3')->put($fileName, file_get_contents($data['file']), 'public');
            $data['name'] = $fileName;
        }
        $oldType = $document->type;
        $document->update($data);
        if (isset($data['load_id'])) {
            if ($data['type'] == 'Notice of Assignment') {
                Load::find($data['load_id'])->update(['has_noa' => true]);
            } elseif ($oldType == 'Notice of Assignment' && $oldType != $data['type']) {
                Load::find($data['load_id'])->update(['has_noa' => false]);
            }
        }
        if (isset($data['file'])) {
            $document->file_path = env('AWS_STORAGE_URL').$fileName;
        }

        return response()->json(['success' => $document]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, Request $request, Document $document)
    {
        if (!is_null($document->load_id) && $document->type == 'Notice of Assignment') {
            Load::find($document->load_id)->update(['has_noa' => false]);
        }
        //todo remove from aws
        return response()->json(['success' => $document->delete()]);
    }

    public function download($id)
    {
        $document = Document::find($id);
        $headers = [
            'Content-Type'        => 'Content-Type: application/zip',
            'Content-Disposition' => 'attachment; filename="'. $document->name .'"',
        ];

        return Download::make(Storage::disk('s3')->get($document->name), 200, $headers);
    }
}
