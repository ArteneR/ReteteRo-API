<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PageContent extends Model
{
        use HasFactory;
        
        protected $table = "pages_content";

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'page',
            'content'
        ];


        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [];


        /**
         * The attributes that are guarded (eg. to protect against mass assignment).
         *
         * @var array
         */
        protected $guarded = [];


        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [];
}
