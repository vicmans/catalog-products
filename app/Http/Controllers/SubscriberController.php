<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Jobs\SendWelcomeEmail;
use App\Http\Requests\SubscribeRequest;
use App\Notifications\EmailUnsubscribed;
use App\Http\Requests\UnsubscribeRequest;

class SubscriberController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $body = $request->validated();

        $subscriber = Subscriber::create(['email' => $body['email']]);

        SendWelcomeEmail::dispatch($subscriber);

        return response()->json([
            'message' => 'Successfully subscribed to the newsletter'
        ], 201);
    }

    public function unsubscribe(UnsubscribeRequest $request)
    {
        $body = $request->validated();

        $subscriber = Subscriber::where('email', $body['email'])->firstOrFail();

        $subscriber->notify(new EmailUnsubscribed);

        $subscriber->delete();

        return response()->json([
            'message' => 'Successfully unsubscribed to the newsletter.'
        ], 200);
    }
}
