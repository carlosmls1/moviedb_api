<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowRequest;
use App\Models\Show;
use Illuminate\Http\Request;

class ShowCtrl extends Controller
{
    /**
     * It returns a paginated list of all the shows in the database
     */

    public function index(){
        $shows = Show::paginate();
        return response()->json($shows);
    }

    /**
     * It returns a JSON response of the show object
     */
    public function view(Show $show){
        return response()->json($show);
    }

    public function update(Show $show, ShowRequest $request){

        $show->update([
            'poster_path' => $request->poster_path,
            'original_title' => $request->original_title,
            'title' => $request->title,
            'overview' => $request->overview,
            'status' => $request->status,
        ]);

        return response()->json(['status'=>true,'id'=>$show->id]);
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
        return response()->json(['status'=>true,'id'=>$show->id]);
    }

    public function delete(Show $show){
        $show->delete();
        return response()->json(['status'=>true]);
    }
}
