<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillStoreRequest;
use App\Models\Level;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * SkillController constructor.
     */
    public function __construct()
    {
        $this->middleware('has_filled_profile')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skills.index', [
           'skills' => auth()->user()->skills,
            'levels' => Level::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create', [
            'levels' => Level::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillStoreRequest $request)
    {
        auth()->user()->skills()->create([
            'name' => $request->name,
            'level_id' => $request->level
        ]);
        return redirect()->route('skills.index')->with('success', 'Záznam bol vytvorený');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(SkillStoreRequest $request, Skill $skill)
    {
        $skill->name = $request->name;
        $skill->level_id = $request->level;
        $skill->save();
        return redirect()->route('skills.index')->with('success', 'Záznam bol upravený');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Záznam bol odstránený');
    }
}
