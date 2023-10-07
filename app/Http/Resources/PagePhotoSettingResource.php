<?php

namespace App\Http\Resources;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagePhotoSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Picture $this */
        return [
            'id' => $this->id,
            'origin_name' => $this->origin_name,
            'src' => $this->attachment->first()->url,
//            'attachment' => $this->attachment,
        ];
    }
}
