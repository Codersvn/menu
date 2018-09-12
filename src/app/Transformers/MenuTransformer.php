<?php

namespace VCComponent\Laravel\Menu\Transformers;

use League\Fractal\TransformerAbstract;
use VCComponent\Laravel\Menu\Entities\Menu;

class MenuTransformer extends TransformerAbstract
{
    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    public function transform(Menu $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'timestamps' => [
                'created_at' => $model->created_at,
                'updated_at' => $model->updated_at,
            ],
        ];
    }

    public function includeMenus($model)
    {
        return $this->collection($model->menus, new ItemMenuTransformer);
    }
}
