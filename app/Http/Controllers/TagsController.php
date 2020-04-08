<?php

namespace App\Http\Controllers;

use App\Tag;
//use App\http\Requests\Categories\CreateCategoryRequest;
use App\http\Requests\Tags\CreateTagRequest;
use App\http\Requests\Tags\UpdateTagRequest;
use Illuminate\Http\Request;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('tags.index')->with('tags', tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $nTag = new Tag();
        
        Tag::create([

            'name' => $request->name
        ]);

        session()->flash('success', 'Tag created successfully!');

        return redirect(route('tags.index'));

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
    public function edit(Tag $tag)
    {


        return view('tags.create')->with('tag', $tag);
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->name = $request->name;
        $tag->save();

        session()->flash('success', 'Tag updated successfully!');
        return redirect(route('tags.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
              //delete record
              $tag->delete();
              session()->flash('success', 'tag deleted successfully.' );

              return redirect(route('tags.index'));

              //comment in testing branch in TagsController

    }
}