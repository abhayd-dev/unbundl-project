<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        //fetch all leads with pagination
        $leads = Lead::latest()->paginate(10);
        return view('admin.leads.index', compact('leads'));
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return back()->with('success', 'Lead record deleted.');
    }
}