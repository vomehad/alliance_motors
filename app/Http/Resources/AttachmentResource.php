<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Orchid\Attachment\Models\Attachment;

class AttachmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Attachment $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'original_name' => $this->original_name,
            'url' => $this->url,
        ];
    }
}
