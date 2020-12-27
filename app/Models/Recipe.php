<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Recipe extends Model
{
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'title',
            'author_id',
            'description',
            'time',
            'difficulty',
            'portions',
            'ingredients',
            'preparation_method'
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


        public function author() {
                return $this->belongsTo(User::class);
        }


        public function category() {
                return $this->hasMany(RecipeCategory::class);
        }


        public function images() {
                return $this->hasMany(RecipeImage::class);
        }


        public function views() {
                return $this->hasMany(RecipeView::class);
        }


        public function votes() {
                return $this->hasMany(RecipeVote::class);
        }


        public function comments() {
                return $this->hasMany(RecipeComment::class);
        }
}
