<?php

namespace VCComponent\Laravel\Menu\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use VCComponent\Laravel\Menu\Repositories\ItemMenuRepository;
use VCComponent\Laravel\Menu\Entities\ItemMenu;
/**
 * Class ItemMenuRepositoryEloquent.
 *
 * @package namespace VCComponent\Laravel\Menu\Repositories;
 */
class ItemMenuRepositoryEloquent extends BaseRepository implements ItemMenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ItemMenu::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
