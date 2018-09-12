<?php

namespace VCComponent\Laravel\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use VCComponent\Laravel\Menu\Entities\ItemMenu;

class Menu extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $with = ['menus'];

    public function itemMenu()
    {
        return $this->hasMany(ItemMenu::class, 'menu_name');
    }

    public function menus()
    {
        return $this->hasMany(ItemMenu::class)->where('parent_id', 0);
    }
}
