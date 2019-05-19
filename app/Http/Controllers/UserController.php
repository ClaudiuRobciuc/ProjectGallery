<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\CountryModel;
use App\Http\Requests\Front\UserRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Crypt;
use Session;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $countries = CountryModel::all()->pluck('country_name', 'id');

        if (!$user) {
            abort(404);
        }

        return view('front.user.edit', [
            'user' => $user,
            'countries' => $countries,
        ]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find(Crypt::decrypt($id));

        if (!$user) {
            abort(404);
        }

        $data = $request->all();

        $user->update($data);

        Session::flash('success', 'Details updated Succesfully!');
        return redirect()->route('frontpage.index');
    }

}