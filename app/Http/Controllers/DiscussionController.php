<?php

namespace App\Http\Controllers;

use App\Events\DiscussionCreated;
use App\Models\Discussion;
use App\Http\Requests\UpdateDisscussionRequest;
use Illuminate\Http\Request;

class DiscussionController extends Controller
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
     * @param Request $request
     * @param $topic_id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request, $topic_id)
    {
        $discussion = Discussion::query()->create([
            'user_id' => $request->user()->id,
            'topic_id' => $topic_id,
            'body' => $request->body,
        ])->load('user');

        broadcast(new DiscussionCreated($discussion))->toOthers();

        return $discussion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $disscussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $disscussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discussion  $disscussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $disscussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisscussionRequest  $request
     * @param  \App\Models\Discussion  $disscussion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisscussionRequest $request, Discussion $disscussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discussion  $disscussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $disscussion)
    {
        //
    }
}
