<?php

namespace VCComponent\Laravel\Menu\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use VCComponent\Laravel\Menu\Repositories\MenuRepository;
use VCComponent\Laravel\Menu\Entities\Menu;
/**
 * Class MenuRepositoryEloquent.
 *
 * @package namespace VCComponent\Laravel\Menu\Repositories;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
