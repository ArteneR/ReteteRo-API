<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\AvailableRecipeCategory;
use App\Http\Resources\AvailableRecipeCategoryResource;
use App\Http\Resources\AvailableRecipeCategoryCollection;


class AvailableRecipeCategoryController extends Controller
{
        public function getAll() {
                return new AvailableRecipeCategoryCollection(AvailableRecipeCategory::all());
        }
}
