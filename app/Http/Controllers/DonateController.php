<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonateRequest;
use App\Mail\DonateMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class DonateController extends Controller
{
    public function index(): View
    {
        return view('donate.index');
    }

    public function store(DonateRequest $request): RedirectResponse
    {
        Mail::to(config('site.contact.email'))->send(
            new DonateMessageMail($request->validated()),
        );

        return redirect()
            ->route('donate.index')
            ->with('success', __('site.donate.success'));
    }
}
