<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Image;
use Storage;

class CarouselController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousel_index')->with('carousels', $carousels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'image' => 'required'
        ]);
        $input['image'] = time() . '.' . request('image')->extension();
        $img = Image::make(request('image')->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path('app/uploads') . '/' . $input['image']);
        $data['image'] = 'uploads/' . $input['image'];
        Carousel::create($data);
        return redirect()->route('carousel.index')->with('success','Your image has been uploaded.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {

        Storage::disk('public')->delete('/uploads/products/' . $carousel->image);
        $data = request()->validate([
            'image' => 'required'
        ]);
        $input['image'] = time() . '.' . request('image')->extension();
        $img = Image::make(request('image')->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path('app/uploads') . '/' . $input['image']);
        $data['image'] = 'uploads/' . $input['image'];
        $carousel->update($data);
        return redirect()->route('carousel.index')->with('success','Your image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        Storage::disk('public')->delete('/uploads/products/' . $carousel->image);
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success','Your image has been deleted.');
    }
}
