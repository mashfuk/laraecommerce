<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

use Image;
use File;

class CategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('backend.pages.category.create', compact('main_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image',
                ],
                [
                    'name.required' => 'Please provide a category name',
                    'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        //insert images also

        if ($request->image > 0) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/categories/' . $img;
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'A new category has added successfully !!');
        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        //
    }

}
