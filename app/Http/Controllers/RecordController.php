<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer',
            'developer' => 'required',
            'description' => 'required',
        ]);

        Record::create($request->all());
        return redirect()->route('records.index');
    }

    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer',
            'developer' => 'required',
            'description' => 'required',
        ]);

        $record->update($request->all());
        return redirect()->route('records.index');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index');
    }
}
