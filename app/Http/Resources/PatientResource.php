<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            'first_name' => $this->faceSheet->first_name,
            'last_name' => $this->faceSheet->last_name,
            'middle_name' => $this->faceSheet->middle_name,
            'date_of_birth' => $this->faceSheet->dob,
            'marital_status' => $this->faceSheet->marital_status,
            'license_id' => $this->faceSheet->license_id,
            'email' => $this->faceSheet->email,
            'sex' => $this->faceSheet->sex,
            'billing_note' => $this->faceSheet->billing_note,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
