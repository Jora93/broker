<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class Document
{
    public static function create($type, $file, $company_id, $carrier_id = null, $customer_id = null, $load_id = null, $description = null, $user = null){
        $data = [];
        $data['company_id'] = $company_id;
        $data['carrier_id'] = $carrier_id;
        $data['customer_id'] = $customer_id;
        $data['load_id'] = $load_id;
        $data['description'] = $description;
        $data['type'] = $type;
        $data['user_id'] = !is_null($user) ? $user->id : null;
        $fileName = time().str_replace(' ', '_', $file->getClientOriginalName());
        Storage::disk('s3')->put($fileName, file_get_contents($file), 'public');
        $data['name'] = $fileName;
        $document = \App\Models\Document::create($data);
        $document->file_path = env('AWS_STORAGE_URL').$fileName;

        return $document;
    }
}
