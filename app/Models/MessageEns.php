<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MessageEns extends Model
{
    use Notifiable;

    protected $table = 'messages_enseignant';

    protected $fillable = [
        'id_enseignant',
        'content',
        'envoye_par_enseignant',
        'status',
        'created_at',
    ];
}
