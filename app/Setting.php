<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = ['develop_by', 'develop_address', 'develop_phone', 'develop_email', 'develop_website', 'copy_right', 'develop_for_client', 'client_address', 'client_phone', 'client_email', 'client_website', 'status', 'user_id'];
}
