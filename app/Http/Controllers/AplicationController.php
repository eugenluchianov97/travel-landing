<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Mail\ApplicationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AplicationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ApplicationRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();


        Mail::to('eugenluchianov97@gmail.com’')->send(new ApplicationEmail($data));

        return response()->json([
            'status' => false,
            'message' => 'Your application was sent!!'
        ], 200);

    }
}
