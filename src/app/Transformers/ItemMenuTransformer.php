<?php

namespace VCComponent\Laravel\Menu\Transformers;

use League\Fractal\TransformerAbstract;
use VCComponent\Laravel\Menu\Entities\ItemMenu;

class ItemMenuTransformer extends TransformerAbstract
{
    public function __construct($includes = ['menus'])
    {
        $this->setDefaultIncludes($includes);
    }
    public function transform(ItemMenu $model)
    {
        return [
            'id'         => (int) $model->id,
            'menu_id'    => $model->menu_id,
            'label'      => $model->label,
            'link'       => $model->link,
            'type'       => $model->type,
            'parent_id'  => $model->parent_id,
            'timestamps' => [
                'created_at' => $model->created_at,
                'updated_at' => $model->updated_at,
            ],
        ];
    }

    public function includeMenus($model)
    {
        return $this->collection($model->menus, new self);
    }
}
