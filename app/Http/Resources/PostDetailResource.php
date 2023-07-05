<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "image" => $this->image,
            "author" => $this->author,
            "writer" => $this->whenLoaded('writer'),
            "news_content" => $this->news_content,
            "created_at" => date_format($this->created_at, "d M Y H:i:s"),
            "comments" => $this->whenLoaded('comment', function () {
                return collect($this->comment)->each(function ($comment) {
                    $comment->commentator;
                    return $comment;
                });
            }),
            "total_comments" => $this->whenLoaded('comment', function () {
                return $this->comment()->count();
            }),
        ];
    }
}
