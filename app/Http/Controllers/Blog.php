<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class Blog extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Post::all();
        return view('show_data_form',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate(
            [
                'title'=>['required'],
                'content_blog'=>['required']
            ],
            [
                'title.required'=>'Please Enter The Title.',
                'content_blog.required'=>'Please Enter Any.. '
            ]);
        $post_data=new Post;

        // $post_data->title=request('title');
        // $post_data->content_blog=request('content_blog');
        // $post_data->save();

        $post_data->title          = $request->title; //name of input text
        $post_data->content_blog   = $request->content_blog;  //name of input text
        $post_data->image=$request->file;




        // for image

        $image=$request->image; //name of input image

        if($image){
            $image_name=time().".".$image->getClientOriginalExtension();

            // $path = public_path('images');
            $request->file->move('images',$image); //images => folder in public


            $post_data->image=$image_name;
        }

        $post_data->save();

        //after submit

        return back()->with('success','The Blog Stored In Data');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Post::find($id);

        return view('update_paje',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data=Post::find($id);
        $data->title=$request->title;
        $data->content_blog=$request->content_blog;

        $image=$request->file;

        if($image)
        {
            $image_name=time().".".$image->getClientOriginalExtension();
            $request->file->move('images',$image_name);

            $data->image=$image_name;


        }
        $data->save();



        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Post::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function search(Request $request){

        $search=$request->search;
        $data=Post::where('title','Like','%'.$search.'%'
        )->orWhere('content_blog','Like','%'.$search.'%'

        )->get();

        return view('show_data_form',compact('data'));
    }
}
