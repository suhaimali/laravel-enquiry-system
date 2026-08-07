<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display all enquiries.
     */
    public function index()
    {
        $enquiries = Enquiry::latest()->get();

        return view('enquiries.index', compact('enquiries'));
    }


    /**
     * Show enquiry form.
     */
    public function create()
    {
        return view('enquiry');
    }


    /**
     * Save enquiry.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);


        Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);


        return redirect()
            ->back()
            ->with('success', 'Enquiry submitted successfully.');
    }


    /**
     * Display one enquiry.
     */
    public function show(Enquiry $enquiry)
    {
        return view('enquiries.show', compact('enquiry'));
    }


    /**
     * Show edit form.
     */
    public function edit(Enquiry $enquiry)
    {
        return view('enquiries.edit', compact('enquiry'));
    }


    /**
     * Update enquiry.
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);


        $enquiry->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);


        return redirect()
            ->route('enquiries.index')
            ->with('success', 'Enquiry updated successfully.');
    }


    /**
     * Delete enquiry.
     */
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();


        return redirect()
            ->route('enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }
}