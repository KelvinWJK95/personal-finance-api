<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntryController extends Controller
{
    public function show(){
        return response()->json(Entry::whereNull('deleted_at')->orderBy('date', 'desc')->get());
    }

    public function create(Request $request){
        $entry = Entry::create($request->all());

        return response()->json($entry, 201);
    }

    public function delete($id){
        Entry::findOrFail($id)->update(['deleted_at' => Carbon::now()]);

        return response('Deleted Successfully', 200);
    }
}
