<?php

namespace App\Listeners;

use App\Events\CalledApi;
use App\Facades\Repository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class SendToVesti
{
    /**
     * Handle the event.
     */
    public function handle(CalledApi $event): void
    {
        Repository::vesti()->addProduct($event->companyUuid, $event->data);
    }
}
