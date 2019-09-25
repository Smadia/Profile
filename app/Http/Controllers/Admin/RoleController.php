<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Role;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::all();
        $users = User::all();
        $data = Role::query()
            ->when($request->q, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->q}%");
            })->orderBy('id', 'desc')
            ->paginate(5)
            ->appends($request->all());

        return view('admin.majestic.role', [
            'menus' => $menus,
            'data' => $data,
            'users' => $users,
            'q' => $request->q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->name = strtolower($request->name);
        $this->validate($request, [
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::query()
            ->create(['name' => $request->name]);

        foreach ($request->roles_menus as $menu){
            $role->getMenus()
                ->attach($menu);
        }

        return back()->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($request->name != $role->name){
            $this->validate($request, [
                'name' => 'required|unique:roles,name'
            ]);
        }

        $request->roles_menus = fill_empty($request->roles_menus, []);

        $role->name = $request->name;
        $role->getMenus()
            ->detach();
        foreach ($request->roles_menus as $menu){
            $role->getMenus()
                ->attach($menu);
        }

        return back()->with('success', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('success', "<b>{$role->name}</b> was deleted!");
    }
}
