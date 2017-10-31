<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
//add last


        $profile  = new profile();

        //$profile->user_id = $event->user->id; + $profile->save()
        $profile->welcome = 'Welcome';//from terminalTINKER or form
        $profile->name = 'Inna';
//$profile->save() equal ====$event->user->profile()->save($profile);
        $event->user->profile()->save($profile);//profile() from the MODEL
    }
}
