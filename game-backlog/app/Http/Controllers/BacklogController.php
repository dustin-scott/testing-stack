<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class BacklogController extends Controller
{
    /**
     * Get the view.
     */
    public function list(): Response
    {
        return Inertia::render('Backlog');
    }

    public function form(): Response
    {
        return Inertia::render('backlog/New');
    }

    public function create(Request $request): RedirectResponse
    {
        return to_route('backlog');
    }
}
