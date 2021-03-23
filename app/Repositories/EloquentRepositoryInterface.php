<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Support\Collection;
//use Your Model

/**
 * Class EloquentRepositoryInterface.
 */
interface EloquentRepositoryInterface extends BaseRepository
{
    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
