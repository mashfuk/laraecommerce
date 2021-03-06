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
    public function edit($id) {
        //
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category = Category::find($id);

        if (!is_null($category)) {
            return view('backend.pages.category.edit', compact('category', 'main_categories'));
        } else {
            return resirect()->route('admin.categories');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //

        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image',
                ],
                [
                    'name.required' => 'Please provide a category name',
                    'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        //insert images also
        if ($request->image > 0) {
            //Delete the old image from folder

            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/categories/' . $img;
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'Category has updated successfully !!');
        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        //
        $category = Category::find($id);
      if (!is_null($category)) {
        // If it is parent category, then delete all its sub category
        if ($category->parent_id == NULL) {
          // Delete sub categories
          $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

          foreach ($sub_categories as $sub) {
            // Delete category image
            if (File::exists('images/categories/'.$sub->image)) {
              File::delete('images/categories/'.$sub->image);
            }
            $sub->delete();
          }

        }

        // Delete category image
        if (File::exists('images/categories/'.$category->image)) {
          File::delete('images/categories/'.$category->image);
        }
        $category->delete();
      }
      session()->flash('success', 'Category has deleted successfully !!');
      return back();
    }

}
