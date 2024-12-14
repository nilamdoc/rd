<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $collection = 'contacts'; // Specify the collection name
    protected $fillable = ['name', 'email', 'phone_code', 'contact', 'country', 'created_at', 'updated_at'];

    // Enable timestamps for MongoDB
    public $timestamps = true; // This will automatically handle created_at and updated_at
}
