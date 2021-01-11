<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\{
    ProfileVisibility,
    ProfileDescription,
    ProfileExtra
};

class SetupTeacherAccount
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if($event->user->hasRole('teacher')){
            //setting the profile visibility
            $visibility = ProfileVisibility::updateOrCreate(
                ['user_id' => $event->user->id],
                ['visibility_type'=>'0']
            );
            
            // Setting the profile linked description...
            $description = ProfileDescription::updateOrCreate(
                ['user_id' => $event->user->id],
                ['description'=>'Please describe something about yourself']
            );

            // Setting the profile linked extras...
            $profile_extra = ProfileExtra::updateOrCreate(
                ['user_id' => $event->user->id],
                ['travel_willingness'=>'0']
            );
        }
    }
}
