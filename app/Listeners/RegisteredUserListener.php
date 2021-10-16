<?php

namespace App\Listeners;

use App\Events\RegisteredUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Role;

class RegisteredUserListener
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
     * @param  RegisteredUserEvent  $event
     * @return void
     */
    public function handle(RegisteredUserEvent $event)
    {
        $role = Role::where('name', 'user')->firstOrFail();
        $event->user->roles()->attach($role->id);
    }
}
