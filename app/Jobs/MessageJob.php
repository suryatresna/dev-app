<?php

namespace App\Jobs;

use Mail;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;

class MessageJob extends Job implements SelfHandling
{
    protected $mailto;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to = null)
    {
        //
        $this->mailto = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admins = User::where('privilege','admin')->get();
        $u = User::where('email',$this->mailto)->first();
        
        Mail::send('emails.signup',array('user'=>$u),function($m) use ($u){
              $m->from('surya.tresna@geekdisq.co', 'DevApp');
              $m->to($u->email, $u->name)->subject(trans('front.mail-signup-member-subject'));
            });

        foreach($admins as $admin){
            Mail::send('emails.reminder',array('user'=>$u,'admin'=>$admin),function($m) use ($admin){
                $m->from('surya.tresna@geekdisq.co', 'DevApp');
                $m->to($admin->email,$admin->name)->subject(trans('front.mail-signup-admin-subject'));
            });
        }
    }

    public function broadcast($message)
    {
        $subscribers = User::where('privilege','subscriber')->get();
        $subs = array();
        foreach($subscribers as $subscriber)
        {
            Mail::send('emails.subscriber',array('messageBody' => $message), function($m) use ($subscriber){
                    $m->from('noreply@admin.co','DevApp');
                    $m->to($subscriber->email,$subscriber->name)->subject(trans('front.mail-signup-member-subject'));
                });
            $subs[] = array(
                'name'  => $subscriber->name,
                'email' => $subscriber->email
            );
        }

        return $subs;
    }
}
