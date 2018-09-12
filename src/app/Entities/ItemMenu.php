<?php

namespace VCComponent\Laravel\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use VCComponent\Laravel\Menu\Entities\ItemMenu;
use VCComponent\Laravel\Menu\Entities\Menu;

class ItemMenu extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'label',
        'link',
        'type',
        'parent_id',
    ];

    protected $with = ['menus'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function menus()
    {
        return $this->hasMany(ItemMenu::class, 'parent_id', 'id', 'menu_id');
    }

    public function renderSubmenu()
    {
        $item_id      = $this->id;
        $item_menu_id = $this->menu_id;

        $getSub = ItemMenu::where('menu_id', $item_menu_id)
            ->where('parent_id', $item_id)
            ->get();
        $html = '';

        if ($getSub->isNotEmpty()) {
            $html = '<ul class="sub-menu">';
            foreach ($getSub as $item) {
                $html .= '<li>';
                $html .= '<a href="' . $item->link . '">';
                $html .= $item->label;
                $html .= '</a>';
                $html .= $item->renderSubmenu();
                $html .= '</li>';
            }
            $html .= '</ul>';

            return $html;
        }
    }
}
