<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $collection = 'contacts'; // Specify the collection name
    protected $fillable = ['name', 'email', 'phone_code', 'contact', 'country'];

    // Enable timestamps for MongoDB
    public $timestamps = true; // This will automatically handle created_at and updated_at
}
