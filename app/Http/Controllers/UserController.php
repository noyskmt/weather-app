<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
  public function index()
  {
    // $adminUser = $this->userService->admin()->first();
    $adminUser = app()->make('adminAccountService')->admin();
    return response()->json($adminUser);

    // return Inertia::render('Admin', [
    //   'adminUser' => $adminUser
    // ]);
  }
}
