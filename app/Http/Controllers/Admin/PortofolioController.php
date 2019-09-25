<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Menu;
use App\Portofolio;
use App\Service;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth', 'checkmenu:portofolio'
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
        $services = Service::all();
        $clients = Client::all();
        $data = Portofolio::query()
            ->when($request->client, function ($query) use ($request) {
                return $query->whereHas('getClient', function ($query) use ($request) {
                    return $query->where('name', $request->client);
                });
            })->when($request->q, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->q}%");
            })->orderBy('id', 'desc')
            ->paginate(5)
            ->appends($request->all());
        $client = in_array($request->client, $clients->pluck('name')->toArray()) ? $request->client : null;

        return view('admin.majestic.portofolio', [
            'data' => $data,
            'clients' => $clients,
            'client' => $client,
            'q' => $request->q,
            'services' => $services
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
            'client_id' => 'required|numeric',
        ]);

        $portofolio = new Portofolio();
        $portofolio->name = $request->name;
        $portofolio->client_id = $request->client_id;
        $portofolio->desc = $request->desc;
        $portofolio->demo = $request->demo;
        $portofolio->save();

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $portofolio->id.'_'.Str::random(40).'.'.$file->getClientOriginalExtension();
            $file->move('portofolio', $fileName);
            $portofolio->image = 'portofolio/'.$fileName;
            $portofolio->save();
        }

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
     * @param Portofolio $portofolio
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $this->validate($request, [
            'name' => 'required',
            'client_id' => 'required|numeric',
        ]);

        $portofolio->name = $request->name;
        $portofolio->client_id = $request->client_id;
        $portofolio->desc = $request->desc;
        $portofolio->demo = $request->demo;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $portofolio->id.'_'.Str::random(40).'.'.$file->getClientOriginalExtension();
            $file->move('portofolio', $fileName);
            $portofolio->image = 'portofolio/'.$fileName;
        }

        $portofolio->save();

        return back()->with('success', 'Succcess!');
    }

    /**
     * emove the specified resource from storage.
     *
     * @param Portofolio $portofolio
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Portofolio $portofolio)
    {
        if (File::exists($portofolio->image)){
            File::delete($portofolio->image);
        }

        $portofolio->delete();

        return back()->with('success', '<b>'.$portofolio->name.'</b> is deleted!');
    }
}
