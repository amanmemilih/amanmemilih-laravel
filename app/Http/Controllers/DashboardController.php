<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Activity;
use App\Models\Blog;
use App\Models\Recruitation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['total_admin'] = User::count();
        $data['total_blog'] = Blog::count();

        return view('dashboard.index', $data);
    }
}
