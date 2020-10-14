<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(20);
        $categories = NewsCategory::get();
        return view('admin.news.index', [
            'news' => $news,
            'categories'=>$categories
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::get();
        return view('admin.news.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'       => 'required|min:5|unique:news',
            'description'      => 'required|min:10',
            'image' => 'required|file|max:5000|image',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.news.create')
                ->withErrors($validator);
        } else {
            $news = new News;
            //NEWS::Create
            $news->title=$request->title;
            $news->description=$request->description;
            $news->image = request()->image->store('uploads');
            $news->news_category_id = $request->category;
            $news->save();
            Session::flash('message', 'Successfully created news!');
            return redirect()->route('admin.news.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = NewsCategory::get();
        $news = News::find($id);
        return view('admin.news.show',[
            'news'=>$news,
            'categories'=>$categories
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        $categories = NewsCategory::get();
        return view('admin.news.edit',[
            'categories'=>$categories,
            'news'=>$news
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(),[
            'title'       => 'min:5',
            'description' => 'min:10',
            'image' => 'file|max:5000|image'
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.news.create')
                ->withErrors($validator);
        } else {
            $news->update($request->all());
            if (request()->has('image')) {
                $news->image = request()->image->store('uploads');
                $news->save();
            }
            Session::flash('success', 'News successfully updated');
            return redirect()->route('admin.news.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
    
}
