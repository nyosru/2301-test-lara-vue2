<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'record_id' => 'required|numeric',
            'tag_id' => 'required|numeric',
            // 'body' => 'required',
        ]);

        // dd([ $request->record_id, $request->tag_id ]);
        $res = [];
        try {
            $rec = Record::find($validated['record_id']);
            $rec->tags()->attach($validated['tag_id']);
            $res['result'] = true;
        } catch (\Exception $e) {
            $res['result'] = false;
            $res['msg'] = $e->getMessage();
        }
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recordId, $tagId)
    {
        $res = [];
        try {
            $rec = Record::find($recordId);
            $rec->tags()->detach($tagId);
            $res['result'] = true;
        } catch (\Exception $e) {
            $res['result'] = false;
            $res['msg'] = $e->getMessage();
        }
        return response()->json($res);
    }
}
