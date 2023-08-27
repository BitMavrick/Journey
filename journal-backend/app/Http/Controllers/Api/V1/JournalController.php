<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Journal;
use App\Http\Requests\V1\StoreJournalRequest;
use App\Http\Requests\V1\UpdateJournalRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\JournalResource;
use App\Http\Resources\V1\JournalCollection;
use Illuminate\Http\Request;
use App\Filters\V1\JournalsFilter;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $filter = new JournalsFilter();
        $queryItems = $filter->transform($request); // ['column', 'operator', 'value']

        if (count($queryItems) == 0) {
            return new JournalCollection(Journal::paginate());
        } else {
            $journals = Journal::where($queryItems)->paginate();
            return new JournalCollection($journals->appends($request->query()));
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
