<?php

namespace App\Http\Controllers;

use App\Models\Link;

class LinkController extends Controller
{
    public function redirectToDestination($shortLink)
    {
        $shortLink = Link::query()->whereShortLink($shortLink)->first();

        if (! $shortLink) {
            abort(404);
        }

        $shortLink->logs()->create();

        return redirect()->away($shortLink->destination_link);
    }
}
