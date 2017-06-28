<?php

namespace App\Repositories;

use App\Models\AbstractModel;

abstract class AbstractRepository
{

    /**
     * @var AbstractModel
     */
    private $model;

    public function __construct(AbstractModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     *
     * @return AbstractModel
     */
    public function find($id)
    {
        $id = (int) $id;

        return  $this->model->find($id);
    }
}
