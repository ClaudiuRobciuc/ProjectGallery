<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\PaintingModel;
use App\PaintingTypeModel;
use App\Http\Requests\Admin\PaintingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use Session;

class PaintingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paintings = PaintingModel::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.painting.index', [
            'paintings' => $paintings,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = PaintingTypeModel::all()->pluck('slug', 'id');
        return view('admin.painting.create', [
            'types' => $types,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PaintingRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Stored filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/paintings', $fileNameToStore);
        }
        else
        {   
            $fileNameToStore = 'noimage.jpg';
        }
        
        //create post
        $painting = new PaintingModel();
        $painting->refference_id = randomString();
        $painting->title = $data['title'];
        $painting->image = $fileNameToStore;
        $painting->author = $data['author'];
        $painting->price = $data['price'];
        $painting->description = $data['description'];
        $painting->type = $data['type'];
        
        $painting->save();

        Session::flash('success', 'Painting created Succesfully!');
        return redirect()->route('admin.painting.index');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $painting = PaintingModel::find($id);

        if (!$painting) {
            abort(404);
        }
        $types = PaintingTypeModel::all()->pluck('slug', 'id');

        return view('admin.painting.edit', [
            'painting' => $painting,
            'types' => $types
        ]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaintingRequest $request, $id)
    {
        $painting = PaintingModel::find($id);

        if (!$painting) {
            abort(404);
        }

        $data = $request->all();

        if($request->hasFile('image'))
        {
            
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Stored filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image

            $path = $request->file('image')->storeAs('public/paintings', $fileNameToStore);
        }
        else
        {
            if($painting->image != 'noimage.jpg')
                $fileNameToStore = $painting->image;
            else
                $fileNameToStore = 'noimage.jpg';
        }

        $data['image'] = $fileNameToStore;
        $painting->update($data);

        Session::flash('success', 'Painting updated Succesfully!');
        return redirect()->route('admin.painting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $painting = PaintingModel::find($id);
        
        if (!$painting) 
        {
            abort(404);
        }

        $painting->delete();

        Session::flash('success', 'Painting deleted!');
        return redirect()->route('admin.painting.index');
    }
}