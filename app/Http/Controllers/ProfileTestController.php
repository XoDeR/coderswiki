<?php

namespace App\Http\Controllers;

use App\Models\FormSession;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileTestController extends Controller
{
    public function update(Request $request, FormSession $session)
    {
        $step = $request->input('step');
        $fields = $request->input('fields', []);

        $rules = match ($step) {
            0 => ['name' => 'required|string', 'email' => 'required|email',],
            1 => ['city' => 'required|string', 'address' => 'required|string'],
            2 => ['phone' => 'required|string'],
            default => [],
        };

        $validated = validator($fields, $rules)->validate();

        $session->update([
            'data' => array_merge($session->data ?? [], $validated),
            'current_step' => $step,
        ]);

        return back();
    }

    public function show(FormSession $session)
    {
        return Inertia::render('Forms/ProfileForm', ['session' => $session]);
    }
}
