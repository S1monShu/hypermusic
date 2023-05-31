<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllGuitarsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!empty($this->myzPrice)){
            if ($this->skifPrice > $this->myzPrice){
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'price' => $this->myzPrice,
                    'price2' => $this->skifPrice,
                    'img' => $this->img,
                    'imgTwo' => $this->imgTwo,
                    'imgThree' => $this->imgThree,
                    'specifications' => $this->specifications,
                    'skifHref' => $this->skifHref,
                    'myzHref' => $this->myzHref
                ];
            } else {
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'price' => $this->skifPrice,
                    'price2' => $this->myzPrice,
                    'img' => $this->img,
                    'imgTwo' => $this->imgTwo,
                    'imgThree' => $this->imgThree,
                    'specifications' => $this->specifications,
                    'skifHref' => $this->skifHref,
                    'myzHref' => $this->myzHref
                ];
            }
        } else {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'price' => $this->skifPrice,
                'price2' => $this->myzPrice,
                'img' => $this->img,
                'imgTwo' => $this->imgTwo,
                'imgThree' => $this->imgThree,
                'specifications' => $this->specifications,
                'skifHref' => $this->skifHref,
                'myzHref' => $this->myzHref
            ];
        }
    }
}
