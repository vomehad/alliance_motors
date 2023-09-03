<?php

namespace App\Http\Resources;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Person $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'job' => $this->job,
            'department' => $this->department,
            'attachment' => new AttachmentResource($this->getPhoto()),
        ];
    }
}
