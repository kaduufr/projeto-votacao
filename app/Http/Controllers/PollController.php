<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PollController extends Controller
{
    function new(): View {
        return view('poll.new');
    }
}
