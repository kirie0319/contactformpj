<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $guarded = ['id'];

    public static $rules = array(
        'fullname' => [
            'required',
            'max:255'
        ],
        'gender' => [
            'required'
        ],
        'email' => [
            'required',
            'email'
        ],
        'postcode' => [
            'required',
            'regex:/\A\d{3}[-]\d{4}\z/'
        ],
        'address' => [
            'required',
            'max:255'
        ],
        'opinion' => [
            'required',
            'max:120'
        ],
    );
}
