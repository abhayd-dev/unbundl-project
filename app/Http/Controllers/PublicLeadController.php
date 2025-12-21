<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Mail\ContactQueryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicLeadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'                 => 'required|string|max:255',
            'phone'                => 'required|string|max:15',
            'email'                => 'required|email|max:255',
            'address'              => 'nullable|string|max:255',
            'interested_car_types' => 'required|array',
            'message'              => 'nullable|string',
        ]);

        $lead = new Lead();
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->address = $request->address;
        $lead->message = $request->message;
        $lead->interested_car_types = $request->interested_car_types;
        $lead->save();

        //send email to admin for contact us form submissions
        if (in_array('General Inquiry', $request->interested_car_types, true)) {

            $adminEmail = config('mail.from.address', 'admin@example.com');

            Mail::to($adminEmail)
                ->queue(new ContactQueryMail($lead));
        }

        return back()->with(
            'success',
            'Thank you! We will contact you soon.'
        );
    }
}
