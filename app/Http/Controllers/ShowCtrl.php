<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowRequest;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShowCtrl extends Controller
{
    //
    public function index(){
        $shows = Show::paginate();
        return view('show.index', compact('shows'));
    }
    public function create(){
        return view('show.create');
    }
    public function edit(Show $show){
        return view('show.edit', compact('show'));
    }
    public function update(Show $show, ShowRequest $request){

        $show->update([
            'poster_path' => $request->poster_path,
            'original_title' => $request->original_title,
            'title' => $request->title,
            'overview' => $request->overview,
            'status' => $request->status,
        ]);

        return redirect()->route('show.index')->with('success', 'Show updated.');
    }
    public function store(ShowRequest $request){
        $show_data = [
            'poster_path' => $request->poster_path,
            'original_title' => $request->original_title,
            'title' => $request->title,
            'overview' => $request->overview,
            'status' => $request->status,
        ];
        $show = Show::create($show_data);
        if ($show) {
            return redirect()->route('show.index')->with('success', 'Show created.');
        }
    }
    public function delete(Show $show){
        $show->delete();
        return redirect()->route('show.index')->with('success', 'Show deleted.');
    }

}
