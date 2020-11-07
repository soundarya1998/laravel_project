<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat = subcategory::select('subcategories.*','categories.category_name')
                                ->join('categories','categories.id','=','subcategories.category_id')
                                ->get();
        return view('Admin.subcategory_details',compact('subcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat    = category::get();
        $subcat = subcategory::get();
        return view('Admin.insert_subcategory',compact('subcat','cat'));
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
            'category_id'      =>'required',
            'subcategory_name' =>'required',
            'image'            =>'required|mimes:png|max:1000000'
            ]);
            if($request->hasfile('image')){
                $file = $request->file('image');
                $img  = $file->getClientOriginalName();
            }
            $subcategory_name = $request->get('subcategory_name');
            $category_id      = $request->get('category_id');
            $image = $file;

            $subcat = new subcategory;
            $subcat->subcategory_name = $subcategory_name;
            $subcat->category_id = $category_id;
            $subcat->image = $img;
            $file->move(public_path(),$img);

        // $subcat = new subcategory([
        //     'subcategory_name' => $request->get('subcategory_name'),
        //     'image'            => $file, 
        //     'category_id'      => $request->get('category_id'),   
        // ]);
        
        $subcat->save();
        if($subcat){
            echo "<script>alert('Inserted Successfully');window.location.href='/subcategory';</script>";
        }
        else
            echo "<script>alert('Failed!');window.location.href='/subcategory';</script>";
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
        $cat    = category::get();
        $subcat = subcategory::where('id',$id)->get();
        return view('Admin.edit_subCategory',compact('cat','subcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'category_id'      =>'required',
            'subcategory_name' =>'required',
            'image'            =>'required|mimes:png|max:1000000'
            ]);
            if($request->hasfile('image')){
                $file = $request->file('image');
                $img  = $file->getClientOriginalName();
            }
        $subcat = subcategory::find($id);
        $subcat->subcategory_name = $request->get('subcategory_name');
        $subcat->category_id = $request->get('category_id');
        $subcat->image = $img;
        $file->move(public_path(),$img);
        $subcat->save();
        echo "<script>alert('Updated Successfully');window.location.href='/subcategory';</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcat = subcategory::find($id);
        $subcat->delete();
        echo "<script>alert('Deleted Successfully');window.location.href='/subcategory';</script>";
    }
}
