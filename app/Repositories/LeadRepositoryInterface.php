<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
//use Your Model

/**
 * Class LeadRepositoryInterface.
 */
interface LeadRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;
}
