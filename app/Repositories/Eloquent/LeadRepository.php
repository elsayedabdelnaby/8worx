<?php

namespace App\Repositories\Eloquent;

use App\Models\Lead;
use App\Repositories\LeadRepositoryInterface;
use Illuminate\Support\Collection;

//use Your Model

/**
 * Class LeadRepository.
 */
class LeadRepository extends BaseRepository implements LeadRepositoryInterface
{
    /**
     * LeadRepository constructor.
     *
     * @param User $model
     */
    public function __construct(Lead $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
