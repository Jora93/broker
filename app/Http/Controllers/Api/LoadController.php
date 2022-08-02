<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dispatcher;
use App\Models\Load;
use Illuminate\Http\Request;

class LoadController extends Controller
{
    public function getLoads($company_id)
    {
        $loads = Load::where('company_id', $company_id)->with(['customer', 'carrier', 'drops'])->orderBy('created_at', 'desc')->paginate(25);

        return response()->json(['data' => $loads]);
    }
}
