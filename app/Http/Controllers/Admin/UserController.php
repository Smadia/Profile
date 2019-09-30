<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::query()
            ->when($request->q, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->q}%");
            })->orderBy('id', 'desc')
            ->paginate()
            ->appends($request->all());
        $roles = Role::all();

        return view('admin.majestic.user', [
            'data' => $data,
            'q' => $request->q,
            'roles' => $roles,
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
        $this->validate($request, [
            'name' => 'required',
            'password' => 'min:8|confirmed',
            'email' => 'required',
            'image' => 'required'
        ]);

        $request->roles = fill_empty($request->roles, []);

        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->image = '';
        $user->save();

        foreach ($request->roles as $role){
            $user->getRoles()
                ->attach($role);
        }

        $file = $request->file('image');
        $fileName = $user->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move('user', $fileName);

        $user->image = 'user/' . $fileName;
        $user->save();

        return back()->with('success', 'Succcess!');
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
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($request->email != $user->email){
            $this->validate($request, [
                'email' => 'unique:users,email'
            ]);
        }

        $request->roles = fill_empty($request->roles, []);
        $request->menus = fill_empty($request->menus, []);

        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)){
            $this->validate($request, [
                'password' => 'min:8|confirmed',
            ]);

            $user->password = bcrypt($request->password);
        }

        $user->save();

        $user->getRoles()->detach();
        foreach ($request->roles as $role){
            $user->getRoles()
                ->attach($role);
        }

        $user->getMenus()->detach();
        foreach ($request->menus as $menu){
            $menu = Menu::query()
                ->find($menu);
            if ($user->isMenuAllowed($menu)){
                $user->getMenus()
                    ->attach($menu);
            }
        }


        if ($request->hasFile('image')) {
            if (File::exists($user->image)) {
                File::delete($user->image);
            }

            $file = $request->file('image');
            $fileName = $user->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move('user', $fileName);
            $user->image = 'user/' . $fileName;
        }

        $user->save();

        return back()->with('success', 'Succcess!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if (File::exists($user->image)) {
            File::delete($user->image);
        }

        $user->delete();

        return back()->with('success', '<b>' . $user->name . '</b> was deleted!');
    }
}
