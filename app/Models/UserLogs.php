<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserLogs extends Model
{

  protected $table = 'action_logs_users';

  public function user()
  {
    return $this->belongsTo(Client::class, 'user_id', 'id');
  }
}
