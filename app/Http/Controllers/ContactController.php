<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Mail::to(config('site.contact.email'))->send(
            new ContactMessageMail($request->validated()),
        );

        return redirect()
            ->route('contact.index')
            ->with('success', __('site.contact.success'));
    }
}
