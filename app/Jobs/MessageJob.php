<?php

namespace App\Jobs;

use Illuminate\Contracts\Mail\Mailer;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;

class MessageJob extends Job implements SelfHandling
{
    protected $mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Mailer $mail)
    {
        //
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($to)
    {
        $admins = User::where('privilege','admin')->get();
        $u = User::where('email',$to)->first();
        
        $this->mail->send('emails.signup',array('user'=>$u),function($m) use ($u){
              $m->from('surya.tresna@geekdisq.co', 'DevApp');
              $m->to($u->email, $u->name)->subject(trans('front.mail-signup-member-subject'));
            });

        foreach($admins as $admin){
            $this->mail->send('emails.reminder',array('user'=>$u,'admin'=>$admin),function($m) use ($admin){
                $m->from('surya.tresna@geekdisq.co', 'DevApp');
                $m->to($admin->email,$admin->name)->subject(trans('front.mail-signup-admin-subject'));
            });
        }
    }
}
