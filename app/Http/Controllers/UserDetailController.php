<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailStoreRequest;
use App\Models\DrivingLicense;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    /**
     * UserDetailController constructor.
     */
    public function __construct()
    {
        $this->middleware('has_profil')->only('create');
        $this->middleware('has_filled_profile')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('userdetails.index', [
        'userDetail' => auth()->user()->userDetail,
        'drivingLicense' => DrivingLicense::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('userdetails.create', [
           'drivingLicense' => DrivingLicense::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDetailStoreRequest $request)
    {
      $userDetail =  auth()->user()->userDetail()->create($request->validated());
      $userDetail->drivingLicenses()->sync($request->get('driving_licenses') ? : []);

        return redirect()->route('user-details.index')->with('success', 'Údaje boli úspešne vytvorené');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UserDetailStoreRequest $request, UserDetail $userDetail)
    {
        $userDetail->update($request->validated());
        $userDetail->drivingLicenses()->sync($request->get('driving_licenses') ? : []);
        return redirect()->route('user-details.index')->with('success', 'Údaje boli upravené.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
