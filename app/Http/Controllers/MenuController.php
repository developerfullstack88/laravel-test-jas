<?php


namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Routing\Controller as BaseController;

class MenuController extends BaseController{

    public function getMenuItems() {
        $menus=MenuItem::with(['children.children'])->whereHas('children')->where('parent_id',null)->get();
        return response()->json($menus);
    }
}
