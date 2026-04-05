<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/about', 'about');

Route::view('/contact', 'contact');

Route::view('/services', 'services');

Route::view('/showcases', 'showcases');

Route::view('/blog', 'blog');

Route::get('/formtest', function () {
    $emails = session()->get('emails', []);

    return view('formtest', [
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function () {
    $data = request()->validate([
        'email' => 'required|email',
    ]);

    $emails = session()->get('emails', []);

    if (in_array($data['email'], $emails, true)) {
        return redirect('/formtest')->with('error', 'This email is already saved.');
    }

    if (count($emails) >= 5) {
        return redirect('/formtest')->with('warning', 'Email limit reached. Only 5 emails are allowed.');
    }

    session()->push('emails', $data['email']);

    return redirect('/formtest')->with('success', 'Email saved successfully.');
});

Route::post('/formtest/delete', function () {
    $index = request('index');
    $emails = session()->get('emails', []);

    if (is_numeric($index) && isset($emails[$index])) {
        unset($emails[$index]);
        session(['emails' => array_values($emails)]);
        return redirect('/formtest')->with('success', 'Email deleted successfully.');
    }

    return redirect('/formtest')->with('error', 'Unable to delete email.');
});