<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserFavoriteRecipe extends Model
{
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'user_id',
            'recipe_id'
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
