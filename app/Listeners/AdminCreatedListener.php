<?php

namespace App\Listeners;

use App\Events\AdminCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Role;

class AdminCreatedListener
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
     * @param  AdminCreatedEvent  $event
     * @return void
     */
    public function handle(AdminCreatedEvent $event)
    {
        $role = Role::where('name', 'admin')->firstOrFail();
        $event->user->roles()->attach($role->id);
    }
}
