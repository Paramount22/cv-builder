<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageStoreRequest;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\Level;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    /**
     * LanguageController constructor.
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
        return view('languages.index', [
            'languages' => auth()->user()->languages,
            'levels' => LanguageLevel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create', [
            'levels' => LanguageLevel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageStoreRequest $request)
    {
        auth()->user()->languages()->create([
            'language' => $request->language,
            'language_level_id' => $request->level
        ]);
        return redirect()->route('languages.index')->with('success', 'Záznam bol vytvorený');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $language->language = $request->language;
        $language->language_level_id = $request->level;
        $language->save();
        return redirect()->route('languages.index')->with('success', 'Záznam bol upravený');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Záznam bol vymazaný');
    }
}
