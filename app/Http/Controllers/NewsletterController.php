<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    // laravel takes this parameter list and looks for it, or checks if it can make it 
    // since there's no constructor for Newsletter, its as simple as just making a new newsletter; and thats what laravel does
    // if there are dependencies, laravel goes thru recursively.
    // if there's a value needed in the constructor and nothing in the service container, laravel doesn't know what's supposed to go there, so it will fail
    public function __invoke(Newsletter $newsletter)
    {
        ddd($newsletter);
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added'
            ]);
        }
        return redirect('/posts')->withSuccess('You\'re now signed up for the newsletter');
    }
}
