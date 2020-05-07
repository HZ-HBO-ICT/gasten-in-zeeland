<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Update extends User
{
     public function get_updates () {

        $user=Auth::user();
       static $logAttributes = ['max_capacity'];
        
     }
}
