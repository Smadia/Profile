<?php

namespace App\Http\Controllers\Admin;

use App\Custom;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth', 'checkmenu:custom'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        return view('admin.majestic.custom', [
            'menu' => $menu,
            'customs' => $customs,
            'currentCustom' => $currentCustom,
            'key' => $request->key
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
            'key' => 'unique:customs,key',
            'type' => 'required'
        ]);

        Custom::query()
            ->create([
                'key' => strtolower($request->key),
                'type' => $request->type,
                'value' => '-'
            ]);

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
     * @param Custom $custom
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Custom $custom)
    {
        $this->validate($request, [
            'value' => 'required'
        ]);

        if ($custom->type == Custom::IMAGE || $custom->type == Custom::FILE){
            $request->file('value')->move('custom', $request->file('value')->getClientOriginalName());
            $custom->value = 'custom/'.$request->file('value')->getClientOriginalName();
        } else {
            $custom->value = $request->value;
        }

        $custom->save();

        return back()->with('success', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
