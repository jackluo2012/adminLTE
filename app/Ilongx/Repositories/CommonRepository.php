<?php
namespace Ilongx\Repositories;

abstract class CommonRepository
{
    /**
     * @var  注入的model
     */
    protected $model;

    /**
     * 根據pk找資料
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*']) {
        return $this->model
            ->find($id, $columns);
    }

    public function findOrFail($id, $columns = ['*']) {
        return $this->model
            ->findOrFail($id, $columns);
    }

    /**
     * 根據一般欄位找資料
     *
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = ['*']) {
        return $this->model
            ->where($attribute, '=', $value)
            ->first($columns);
    }

    /**
     * 回傳全部資料
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model
            ->all($columns);
    }

    /**
     * 回傳分頁資料
     *
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = ['*']) {
        return $this->model
            ->paginate($perPage, $columns);
    }

    /**
     * 新增
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        return $this->model
            ->create($data);
    }

    /**
     * 修改
     *
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute="id") {
        return $this->model
            ->where($attribute, '=', $id)
            ->update($data);
    }

    /**
     * 刪除
     *
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model
            ->destroy($id);
    }

    public function orderBy($attribute, $sort = 'DESC') {
        return $this->model
            ->orderBy($attribute, $sort);
    }

    public function with($attribute) {
        return $this->model
            ->with($attribute);
    }

    public function where($attribute, $relation, $value) {
        return $this->model
            ->where($attribute, $relation, $value);
    }

    public function orWhere($attribute, $relation, $value) {
        return $this->model
            ->orWhere($attribute, $relation, $value);
    }

    public function whereIn($attribute, $array = array()) {
        return $this->model
            ->whereIn($attribute, $array);
    }

}