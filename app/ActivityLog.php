<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\meja;
use Spatie\Activitylog\Traits\LogsActivity;

class ActivityLog extends Model
{
    use LogsActivity;
    protected $table = 'activity_log';

    public function User()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
