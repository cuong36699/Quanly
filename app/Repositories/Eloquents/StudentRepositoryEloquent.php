<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\StudentRepository;
use App\Models\Student;
use App\Validators\StudentValidator;


/**
 * Class StudentRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class StudentRepositoryEloquent extends BaseRepository implements StudentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Student::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function findByFieldLike($field, $session, $paginate)
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->where($field, 'like', '%' .$session. '%')->paginate($paginate);
        $this->resetModel();

        return $this->parserResult($model);
    }
}
