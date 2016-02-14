<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Controllers\Controller;

use App\User;

class MemberController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $req)
    {
        //
        $u = new User;
        $u->email       = $req->input('email');
        $u->password    = bcrypt($req->input('password'));
        $u->name        = $req->input('name');
        $u->phone       = $req->input('phone');
        $u->occupation  = $req->input('occupation');
        if($u->save())
        {
            Mail::send('emails.signup',array('user'=>$u),function($m) use ($u){
              $m->from('surya.tresna@geekdisq.co', 'DevApp');
              $m->to($u->email, $u->name)->subject(trans('front.mail-signup-member-subject'));
            });

            $admins = User::where('privilege','admin')->get();
            foreach($admins as $admin){
                Mail::send('emails.reminder',array('user'=>$u,'admin'=>$admin),function($m) use ($admin){
                    $m->from('surya.tresna@geekdisq.co', 'DevApp');
                    $m->to($admin->email,$admin->name)->subject(trans('front.mail-signup-admin-subject'));
                });
            }
        }



        return redirect()->route('signup.success')->with('message',trans('front.signup-success-desc',['email'=>$u->email]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $user = User::find($id);
        return $user->toJson();
    }

    public function mail()
    {
        $admin = User::where('privilege','admin')->first();
        $mail =Mail::send('emails.welcome',array('user'=>$admin),function($m) use ($admin){
            $m->from('surya.tresna@geekdisq.co', 'DevApp');
            $m->to($admin->email,$admin->name)->subject(trans('front.mail-signup-admin-subject'));
        });
        if($mail){
            return json_encode(array('message'=>'Success Send Email','to'=>$admin->email));
        }
    }
}
