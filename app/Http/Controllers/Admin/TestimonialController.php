<?php

namespace App\Http\Controllers\Admin;

use App\Portofolio;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = Testimonial::query()
            ->when($request->q, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->q}%");
            })->orderBy('id', 'desc')
            ->paginate()
            ->appends($request->all());
        $portofolios = Portofolio::all();

        return view('admin.majestic.testinomial', [
            'data' => $data,
            'q' => $request->q,
            'portofolios' => $portofolios
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
            'content' => 'required'
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->content = $request->content;
        $testimonial->jobtitle = $request->jobtitle;
        $testimonial->helper = $request->helper;
        $testimonial->portofolio_id = $request->portofolio_id;
        $testimonial->image = '';
        $testimonial->save();

        $file = $request->file('image');
        $fileName = $testimonial->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move('testimonial', $fileName);

        $testimonial->image = 'testimonial/' . $fileName;
        $testimonial->save();

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
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $testimonial->name = $request->name;
        $testimonial->content = $request->content;
        $testimonial->jobtitle = $request->jobtitle;
        $testimonial->helper = $request->helper;
        $testimonial->portofolio_id = $request->portofolio_id;

        if ($request->hasFile('image')) {
            if (File::exists($testimonial->image)) {
                File::delete($testimonial->image);
            }

            $file = $request->file('image');
            $fileName = $testimonial->id . '_' . Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move('testimonial', $fileName);
            $testimonial->image = 'testimonial/' . $fileName;
        }

        $testimonial->save();

        return back()->with('success', 'Succcess!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Testimonial $testimonial)
    {
        if (File::exists($testimonial->image)) {
            File::delete($testimonial->image);
        }

        $testimonial->delete();

        return back()->with('success', '<b>' . $testimonial->name . '</b> was deleted!');
    }
}
