<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $cat = category::get()->toArray();
            return view("Admin.category_details",compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.insert_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cat = new category([
        //     'category_name'     => $request->get('category_name'),
        // ]);
        $request->validate([
            'category_name'=>'required'
            ]);
        $category_name= $request->get('category_name');
        $cat = new category;
        $cat->category_name = $category_name;
        $cat->save();
        if($cat){
            echo "<script>alert('Inserted Successfully');window.location.href='/category';</script>";
            // return redirect('/agent');
		}
		else{
            echo "<script>alert('Failed!');window.location.href='/category';</script>";
        }
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
        $cat = category::where('id',$id)->get();
		return view('Admin.edit_category',compact('cat'));
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
            'category_name'=>'required'
            ]);
        $cat = category::find($id);
        $cat->category_name=$request->get('category_name');
        $cat->save();
        echo "<script>alert('Updated Successfully');window.location.href='/category';</script>";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = category::find($id);
        $cat->delete();
        echo "<script>alert('Deleted Successfully');window.location.href='/category';</script>";
    }
}
