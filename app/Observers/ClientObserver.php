<?php

namespace App\Observers;

use App\Models\Client;
use Ramsey\Uuid\Uuid;

class ClientObserver
{   
    public function creating(Client $user)
    {
        $user->user_id = Uuid::uuid4();
    }
}