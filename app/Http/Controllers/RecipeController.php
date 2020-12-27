<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Recipe;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeCollection;


class RecipeController extends Controller
{
        public function getAll() {
                return new RecipeCollection(Recipe::all());
        }


        public function get($id) {
                return new RecipeResource(Recipe::findOrFail($id));
        }


        public function create(Request $request) {
                $requestParams = $request->all();
                $validator = Validator::make($requestParams, [
                        'title'              => 'required|string|between:5,255',
                        'author_id'          => 'required|integer',
                        'description'        => 'required|string|between:5,1000',
                        'time'               => 'required|string|between:2,255',
                        'difficulty'         => 'required|string|between:2,255',
                        'portions'           => 'required|numeric|between:1,8',
                        'ingredients'        => 'required|array',
                        'preparation_method' => 'required|array'
                ]);

                if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                }

                $requestParams['ingredients']        = json_encode($requestParams['ingredients']);
                $requestParams['preparation_method'] = json_encode($requestParams['preparation_method']);

                $recipe = Recipe::create($requestParams);

                return response()->json([
                        'message' => 'Recipe successfully created',
                        'data'    => new RecipeResource($recipe)
                ], 201);
        }


        public function update($id, Request $request) {
                $recipe = Recipe::findOrFail($id);

                $validator = Validator::make($request->all(), [
                        'title'              => 'required|string|between:5,255',
                        'author_id'          => 'required|integer',
                        'description'        => 'required|string|between:5,1000',
                        'time'               => 'required|string|between:2,255',
                        'difficulty'         => 'required|string|between:2,255',
                        'portions'           => 'required|numeric|between:1,8',
                        'ingredients'        => 'required|array',
                        'preparation_method' => 'required|array'
                ]);

                if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                }

                $recipe->title              = $request->title              ? $request->title                           : $recipe->title;
                $recipe->author_id          = $request->author_id          ? $request->author_id                       : $recipe->author_id;
                $recipe->description        = $request->description        ? $request->description                     : $recipe->description;
                $recipe->time               = $request->time               ? $request->time                            : $recipe->time;
                $recipe->difficulty         = $request->difficulty         ? $request->difficulty                      : $recipe->difficulty;
                $recipe->portions           = $request->portions           ? $request->portions                        : $recipe->portions;
                $recipe->ingredients        = $request->ingredients        ? json_encode($request->ingredients)        : $recipe->ingredients;
                $recipe->preparation_method = $request->preparation_method ? json_encode($request->preparation_method) : $recipe->preparation_method;

                $recipe->save();

                return response()->json([
                        'message' => 'Recipe successfully updated',
                        'data'    => new RecipeResource($recipe)
                ], 200);
        }


        public function delete($id) {
                $recipe = Recipe::findOrFail($id);
                $recipe->delete();

                return response()->json([
                        'message' => 'Recipe successfully deleted',
                        'data'    => new RecipeResource($recipe)
                ], 200);
        }
}
