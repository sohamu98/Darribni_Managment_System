<?php

namespace App\Observers;

use App\Models\Coach;
use Illuminate\Support\Facades\Storage;

class CoachObserver
{
    /**
     * Handle the Coach "created" event.
     */
    public function created(Coach $coach): void
    {
        //
    }

    /**
     * Handle the Coach "updated" event.
     */
    public function updated(Coach $coach): void
    {
        //
    }

    /**
     * Handle the Coach "deleted" event.
     */
    public function deleted(Coach $coach): void
    {
        if(Storage::disk('public')->exists($coach->image)){
            Storage::disk('public')->delete($coach->image);
        }
    }

    /**
     * Handle the Coach "restored" event.
     */
    public function restored(Coach $coach): void
    {
        //
    }

    /**
     * Handle the Coach "force deleted" event.
     */
    public function forceDeleted(Coach $coach): void
    {
        //
    }
}
