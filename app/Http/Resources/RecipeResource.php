<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RecipeResource extends JsonResource
{
        public function toArray($request) {
                return [
                    'id'                 => $this->id,
                    'author_id'          => $this->author_id,
                    'author'             => $this->author->username,
                    'title'              => $this->title,
                    'description'        => $this->description,
                    'category'           => isset($this->category[0]['category_id']) ? $this->category[0]['category_id'] : '',
                    'time'               => $this->time,
                    'difficulty'         => $this->difficulty,
                    'portions'           => $this->portions,
                    'ingredients'        => json_decode($this->ingredients),
                    'preparation_method' => json_decode($this->preparation_method),
                    'cover_image'        => $this->getCoverImage($this->images),
                    'images'             => $this->getImages($this->images),
                    'total_views'        => count($this->views),
                    'total_votes'        => count($this->votes),
                    'total_comments'     => count($this->comments),
                    'rating'             => $this->getRating($this->votes),
                    'createdAt'          => $this->created_at,
                    'updatedAt'          => $this->updated_at
                ];
        }


        private function getCoverImage($images) {
                foreach ($images as $image) {
                        if ($image->is_cover_image === 'yes') {
                                $cover_image = $image->image;
                        }
                }

                if (!isset($cover_image)) { 
                        $cover_image = isset($images[0]['image']) ? $images[0]['image'] : ''; 
                }

                return $cover_image;
        }


        private function getImages($images) {
                $recipe_images = [];

                foreach ($images as $image) {
                        $recipe_images[] = [
                                'image'          => $image->image,
                                'is_cover_image' => $image->is_cover_image,
                                'order'          => $image->order
                        ];
                }

                return $recipe_images;
        }


        private function getRating($votes) {
                $ratingsSum = 0;
                $ratingsCnt = count($votes);
                foreach ($votes as $vote) {
                        $ratingsSum += $vote['vote'];
                }

                return ($ratingsCnt > 0) ? $ratingsSum / $ratingsCnt : 0;
        }
}
