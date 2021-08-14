<?php

namespace Archive\Service\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Archive extends Model
{
    use SoftDeletes;
    use Notifiable;
    use HasFactory;
}
