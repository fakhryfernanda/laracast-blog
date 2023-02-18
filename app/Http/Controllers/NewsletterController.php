<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        $newsletter->subscribe(request('email'));

        return redirect('/')
            ->with('success', 'You are now signed up for our newsletter!');
    }
}
