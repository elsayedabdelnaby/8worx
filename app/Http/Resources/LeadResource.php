<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{

    /**
     * The Case variable.
     *
     * @var string
     */
    private $case;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @param string $case
     * @return void
     */
    public function __construct($resource, $case = null)
    {
        $this->resource = $resource;
        $this->case = $case;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lead = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'description' => $this->description,
            'address' => $this->address,
            'gender' => $this->gender
        ];

        switch ($this->case) {
            case 'create':
                $lead['created_at'] = $this->created_at;
                $lead['created_by'] = $this->created_by;
                break;

            case 'update':
                $lead['updated_at'] = $this->updated_at;
                $lead['updated_by'] = $this->updated_by;
                break;

            case 'delete':
                $lead['deleted_at'] = $this->deleted_at;
                $lead['deleted_by'] = $this->deleted_by;
                break;

            default:
                $lead['created_at'] = $this->created_at;
                $lead['created_by'] = $this->created_by;
                $lead['updated_at'] = $this->updated_at;
                $lead['updated_by'] = $this->updated_by;
                break;
        }
        return $lead;
    }
}
