<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        $data = Product::query()
            ->when($request->q, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->q}%");
            })->orderBy('id', 'desc')
            ->paginate(5)
            ->appends($request->all());

        return view('admin.majestic.product', [
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
     * tore a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);

        $model = new Product();
        $model->name = $request->name;
        $model->desc = $request->desc;
        $model->demo = $request->demo;
        $model->image = '';
        $model->save();

        $request->users_products = fill_empty($request->users_products, []);
        foreach ($request->users_products as $user){
            $model->getUsers()
                ->attach($user);
        }

        $file = $request->file('image');
        $fileName = $model->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move('product', $fileName);

        $model->image = 'product/' . $fileName;
        $model->save();

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
     * @param Product $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->demo = $request->demo;

        $request->users_products = fill_empty($request->users_products, []);
        $product->getUsers()
            ->detach();
        foreach ($request->users_products as $user){
            $product->getUsers()
                ->attach($user);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $product->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move('product', $fileName);
            $product->image = 'product/' . $fileName;
        }

        $product->save();

        return back()->with('success', 'Succcess!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        if (File::exists($product->image)) {
            File::delete($product->image);
        }

        $product->delete();

        return back()->with('success', '<b>' . $product->name . '</b> is deleted!');
    }
}
