<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreContactMessageRequest $request)
    {
        $attributes = collect($request->validated());

        ContactMessage::query()->create($attributes->toArray());

        return redirect()->back();
    }
}
