<?php

namespace App\Http\Controllers;
use PDF;


class ResumeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('resume.index', [
            'user' => auth()->user()
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $user = auth()->user();
        $pdf = PDF::loadView('resume.index', compact('user'));
        return $pdf->download('resume.pdf');
    }
}
