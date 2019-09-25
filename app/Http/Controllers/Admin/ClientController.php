<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Client::query()
            ->when($request->q, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->q}%");
            })->orderBy('id', 'desc')
            ->paginate()
            ->appends($request->all());

        return view('admin.majestic.client', [
            'data' => $data,
            'q' => $request->q,
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
            'image' => 'required',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->desc = $request->desc;
        $client->image = '';
        $client->save();

        $file = $request->file('image');
        $fileName = $client->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move('client', $fileName);

        $client->image = 'client/' . $fileName;
        $client->save();

        return back()->with('success', 'Succcess!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $client->name = $request->name;
        $client->desc = $request->desc;

        if ($request->hasFile('image')) {
            if (File::exists($client->image)) {
                File::delete($client->image);
            }

            $file = $request->file('image');
            $fileName = $client->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move('client', $fileName);
            $client->image = 'client/' . $fileName;
        }

        $client->save();

        return back()->with('success', 'Succcess!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        if (File::exists($client->image)) {
            File::delete($client->image);
        }

        $client->delete();

        return back()->with('success', '<b>' . $client->name . '</b> was deleted!');
    }
}
