<?php

namespace App\Http\Resources;

use App\Models\PageAboutSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageAboutSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var PageAboutSetting $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value,
            'extra' => $this->extra,
            'active' => $this->active,
        ];
    }
}
