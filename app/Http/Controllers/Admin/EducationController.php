<?php

namespace App\Http\Controllers\Admin;

use App\Models\Educations;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;

class EducationController extends Controller
{
    use AuthTrait;

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
        $this->checkCRUDPermission('App\Models\Educations', 'list');
        $educations = Educations::all();
        return view('ar.education', compact('educations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        $this->checkCRUDPermission('App\Models\Educations', 'create');

        $inputArr = $request->only([
            'course',
            'institute',
            'grade',
            'total_grade',
            'start_date',
            'end_date',
            'description'
        ]);
        $inputArr['created_by'] = Auth::id();

        Educations::create($inputArr);
        return redirect()->back()->with('success', 'Education Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, $id)
    {
        $this->checkCRUDPermission('App\Models\Educations', 'update');

        $inputArr = $request->only([
            'course',
            'institute',
            'grade',
            'total_grade',
            'start_date',
            'end_date',
            'description'
        ]);
        $inputArr['updated_by'] = Auth::id();

        Educations::find($id)->update($inputArr);
        return redirect()->back()->with('success', 'Education Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkCRUDPermission('App\Models\Educations', 'delete');
        Educations::find($id)->delete();
        return redirect()->back()->with('success', 'Education Deleted Successfully.');
    }
}
