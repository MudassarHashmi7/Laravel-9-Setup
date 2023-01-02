<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::query()->with('getsubcategory')->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::query()->with('getsubcategory')->get();
        return view('category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'url'=>'required',
            'status'=>'required',
        ]);


        $category=new Category();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->url=$request->url;
        $category->status=$request->status;
        $category->save();


        $subcategory = new SubCategory();
        $subcategory->name1 = $request->name1;
        $category = $category->getsubcategory()->save($subcategory);





//        $subcategory = $request['name'];
//        $category->getsubcategory()->save($subcategory);

        return redirect(route('category.index'))->with('success','Category Added Successfully!');
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
    public function edit(Category $categories)
    {

        return view('category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categories)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'url'=>'required',
            'status'=>'required',
        ]);


        $categories->name=$request->name;
        $categories->slug=$request->slug;
        $categories->url=$request->url;
        $categories->status=$request->status;
        $categories->update();

        return redirect(route('category.index'))->with('success','Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('category.index'))->with('success','Category Deleted Successfully!');

    }
}
