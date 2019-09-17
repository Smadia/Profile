<?php

namespace App\Http\Controllers\Admin\Page;

use App\Custom;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $menu = Menu::query()
            ->where('route', 'custom')
            ->first();
        $customs = Custom::all();
        try{
            $currentCustom = Custom::query()->find($request->key);
        } catch (\Exception $exception){
            $currentCustom = null;
        }
        return view('admin.majestic.custom.index', [
            'menu' => $menu,
            'customs' => $customs,
            'currentCustom' => $currentCustom,
            'key' => $request->key
        ]);
    }

    public function edit(Custom $custom)
    {
        return view('admin.majestic.custom.frame-edit', [
            'custom' => $custom
        ]);
    }
}
