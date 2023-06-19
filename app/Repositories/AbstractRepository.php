<?php

namespace App\Repositories;

class AbstractRepository
{
    /**
     *
     */
    protected $model;

    /**
     *
     */
    protected function newQuery()
    {
        return app($this->model)->newQuery();
    }

    /**
     * @param null $query
     * @param int $take
     * @param bool $paginate
     * @param string $sort
     * @param false $descending
     * @return mixed
     */
    public function doQuery($query = null, $take = 15, $paginate = true, $sort = 'id', $descending = false)
    {
        if (is_null($query)) {
            $query = $this->newQuery();
        }

        $query->orderBy($sort, $descending ? 'desc' : 'asc');

        if (true == $paginate) {
            return $query->paginate($take);
        }
        if ($take > 0 || false !== $take) {
            $query->take($take);
        }
        return $query->get();
    }

    /**
     *
     */
    public function create(array $data)
    {
        return app($this->model)::create($data);
    }

    /**
     * @param $id
     * @param bool $fail
     * @return mixed
     */
    public function findByID($id, $fail = true)
    {
        if ($fail) {
            return $this->newQuery()->findOrFail($id);
        }
        return $this->newQuery()->find($id);
    }
}
