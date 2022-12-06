<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skills;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    use AuthTrait;
    protected $user;

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->user = Auth::user();
        $this->checkCRUDPermission('App\Models\Services', 'list');
        $services = Services::all();
        return view('ar.service', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $this->checkCRUDPermission('App\Models\Services', 'create');
        $service = new Services();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->created_by = 1;
        $service->save();
        return redirect()->back()->with('success', 'Service Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $this->checkCRUDPermission('App\Models\Services', 'update');
        $service = Services::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->created_by = 1;
        $service->save();
        return redirect()->back()->with('success', 'Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkCRUDPermission('App\Models\Services', 'delete');
        $service = Services::find($id);
        $service->delete();
        return redirect()->back()->with('success', 'Service Deleted Successfully.');
    }
}
