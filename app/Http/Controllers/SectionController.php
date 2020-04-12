<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(){
        if (auth()->user()->is_admin != 1) {
            return view('admin/no_admin');
        }
        $data = Section::all();
        return view('admin/section', ['data'=>$data]);
    }

    public function store(Request $request)
    {
        $section = Section::create([
            'name' => $request->name,
            'is_theme' => 0,
            'is_event' => 0,
        ]);
        return redirect('section');
    }

    public function add_event(Section $section)
    {
        $data = [];
        $data['is_event'] = 1;
        $section->update($data);
        return redirect('section');
    }

    public function add_theme(Section $section)
    {
        $data = [];
        $data['is_theme'] = 1;
        $section->update($data);
        return redirect('section');
    }

}
