<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;  // Import Gate facade

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $records = Record::all();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        if (!Gate::allows('create record')) {  // Use Gate::allows instead of can
            abort(403);
        }
        return view('records.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create record')) {  // Use Gate::allows instead of can
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'published_at' => 'required|date',
        ]);

        Record::create($request->all());
        return redirect()->route('records.index');
    }

    public function edit(Record $record)
    {
        if (!Gate::allows('edit record')) {  // Use Gate::allows instead of can
            abort(403);
        }
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        if (!Gate::allows('edit record')) {  // Use Gate::allows instead of can
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'published_at' => 'required|date',
        ]);

        $record->update($request->all());
        return redirect()->route('records.index');
    }

    public function destroy(Record $record)
    {
        if (!Gate::allows('delete record')) {  // Use Gate::allows instead of can
            abort(403);
        }

        $record->delete();
        return redirect()->route('records.index');
    }
}
