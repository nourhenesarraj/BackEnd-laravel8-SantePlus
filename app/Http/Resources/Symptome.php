<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Symptome extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        return [

            'Id_symp' => $this->Id_symp,

            'Nom_symp' => $this->Nom_symp,
            

        ];
    }
}
