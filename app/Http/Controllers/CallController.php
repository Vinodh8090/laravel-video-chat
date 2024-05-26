<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CallOffer;
use App\Events\CallAnswer;

class CallController extends Controller
{
    public function offer(Request $request)
    {
        $data = $request->all();
        broadcast(new CallOffer($data))->toOthers();
        return response()->json(['status' => 'offer sent']);
    }

    public function answer(Request $request)
    {
        $data = $request->all();
        broadcast(new CallAnswer($data))->toOthers();
        return response()->json(['status' => 'answer sent']);
    }
}
