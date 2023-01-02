<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category=Category::find($id);
        return view('subcategory.index',compact('category'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'name1'=>'required',
        ]);

        $category = Category::find($id);

        $subcategory = new SubCategory();
        $subcategory->name1 = $request->name1;

        $category = $category->getsubcategory()->save($subcategory);

        return redirect(route('category.index'))->with('success','SubCategory Added Successfully!');
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
    public function edit(SubCategory $subcategories)
    {

        return view('subcategory.edit',compact('subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$subcategories)
    {

        $request->validate([
            'name1'=>'required',
        ]);

//        $category = Category::with('getsubcategory')->find($subcategories);
        $subCategory = SubCategory::find($subcategories);


        $subCategory->name1 = $request->name1;
        $subCategory->save();



//        $category = $subCategory->getsubcategory()->update($subCategory);

        return redirect(route('category.index'))->with('success','SubCategory Update Successfully!');


//        $categoryName = $request->name;
//dd($category->getsubcategory());
//        $category = $category->getsubcategory()->update($subcategories,$categoryName);
//
//        return redirect(route('category.index'))->with('success','SubCategory updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users=SubCategory::findOrFail($id);
        $users->delete();

        return redirect(route('category.index'))->with('success', 'SubCategory has been Deleted successfully');
    }
}
