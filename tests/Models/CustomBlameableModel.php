<?php

namespace Culpa\Tests\Models;

use Culpa\Traits\Blameable;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

/**
 * A model with custom names for fields
 * PHP 5.4+.
 *
 * Custom fields need to have their own relationship-accessors written
 */class CustomBlameableModel extends Model
{
    use Blameable;
    protected $table = 'posts';
    protected $softDelete = true;
    protected $blameable = [        'created' => 'author_id',        'updated' => 'editor_id',        'deleted' => 'purger_id'];

    
    public function author()
    {
        return $this->belongsTo(Config::get('culpa.users.classname', 'App\User'));
    }

    
    public function editor()
    {
        return $this->belongsTo(Config::get('culpa.users.classname', 'App\User'));
    }

    
    public function purger()
    {
        return $this->belongsTo(Config::get('culpa.users.classname', 'App\User'));
    }
}
