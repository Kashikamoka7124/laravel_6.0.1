<?php

namespace App\Http\Controllers;

use Illuminate\Auth\user;
use Illuminate\Http\Request;
use App\Catagory;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagory = Catagory::all();
        return view('admin.catagory.catagory',compact('catagory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        $user = user::create([
            'email' =>$data["email"],
            'password'=>Hash::make($data['password'])
        ]);

        if($user){
            profile::create([
            'user_id' => $user->id,
            ]);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request);

        $category  = catagory::create([

            'title' => $request->title,
            'description' => $request->description,
            'slug' => $request->slug,

        ]);

        $category->parents()->attach($request->parent_id);

        if($category){
            return back()->with('message','Catagory has been added Successfully');
        }
        return back()->with('message','Catagory cannot be added');

        // return back()->with($request-dd());

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        //
    }
}
