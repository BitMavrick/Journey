<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Journal;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\JournalResource;
use App\Http\Resources\V1\JournalCollection;
use Illuminate\Http\Request;
use App\Services\V1\JournalQuery;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $filter = new JournalQuery();
        $queryItems = $filter->transform($request); // ['column', 'operator', 'value']

        if (count($queryItems) == 0) {
            return new JournalCollection(Journal::paginate());
        } else {
            return new JournalCollection(Journal::where($queryItems)->paginate()); // ->get() maybe required
        }
    }


    public function create()
    {
        //
    }


    public function store(StoreJournalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        return new JournalResource($journal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJournalRequest  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}
