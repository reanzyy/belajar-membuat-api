<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'commentator' => $this->whenLoaded('commentator'),
            'comment_content' => $this->comment_content,
            "created_at" => date_format($this->created_at, "d M Y H:i:s"),
        ];
    }
}