<?php

namespace VCComponent\Laravel\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use VCComponent\Laravel\Menu\Entities\ItemMenu;

class GenerateMenuFrontEndController extends Controller
{
    public function render($menu_id, $class_menu = '')
    {
        $getMenus = ItemMenu::where('menu_id', $menu_id)
            ->where('parent_id', 0)
            ->get();

        $data = [
            'getMenus'   => $getMenus,
            'class_menu' => $class_menu,
        ];

        $view = View::make('menu.menu', $data);

        $content = $view->render();

        return $view;
    }
    public function renderUlOnly($menu_id, $options = null)
    {
        $getMenus = ItemMenu::where('menu_id', $menu_id)
            ->where('parent_id', 0)
            ->get();

        $data = [
            'getMenus' => $getMenus,
            'options'  => $options,
        ];

        $view = View::make('menu.menu_ul_only', $data);

        $content = $view->render();

        return $view;
    }
}
