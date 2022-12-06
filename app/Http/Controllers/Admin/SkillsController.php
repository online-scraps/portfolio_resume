<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skills;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
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
        $this->checkCRUDPermission('App\Models\Skills', 'list');
        $skills = Skills::all();
        return view('ar.skill', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkillRequest $request)
    {
        $this->checkCRUDPermission('App\Models\Skills', 'create');
        $skill = new Skills();
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->skill_type_id = $request->skill_type_id;
        $skill->percentage = $request->percentage;
        $skill->created_by = 1;
        $skill->save();
        return redirect()->back()->with('success', 'Skill Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillRequest $request, $id)
    {
        $this->checkCRUDPermission('App\Models\Skills', 'update');
        $skill = Skills::find($id);
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->skill_type_id = $request->skill_type_id;
        $skill->percentage = $request->percentage;
        $skill->created_by = 1;
        $skill->save();
        return redirect()->back()->with('success', 'Skill Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkCRUDPermission('App\Models\Skills', 'delete');
        $skill = Skills::find($id);
        $skill->delete();
        return redirect()->back()->with('success', 'Skill Deleted Successfully.');
    }
}
