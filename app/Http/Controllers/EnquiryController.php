<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
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
}