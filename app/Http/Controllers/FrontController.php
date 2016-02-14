<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('front.index');
    }

    /**
     * Display a Signup page
     *
     * @return Response
     */
    public function signup()
    {
        return view('front.signup');
    }

    /**
     * Display success signup
     */
    public function confirmed()
    {
        return view('front.confirmed');
    }

}
