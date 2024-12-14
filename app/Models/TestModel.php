<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TestModel extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = 'posts';
}