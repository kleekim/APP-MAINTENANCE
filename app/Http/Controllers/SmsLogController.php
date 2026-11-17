<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Http\Request;

class SmsLogController extends Controller
{
    /**
     * Display a listing of SMS logs (Mailhog-like interface).
     */
    public function index(Request $request)
    {
        $query = SmsLog::query();

        // Search by phone number
        if ($request->filled('search')) {
            $query->where('to', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $smses = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('sms.index', compact('smses'));
    }

    /**
     * Display a single SMS log.
     */
    public function show(SmsLog $smsLog)
    {
        return view('sms.show', compact('smsLog'));
    }

    /**
     * Delete a single SMS log.
     */
    public function destroy(SmsLog $smsLog)
    {
        $smsLog->delete();
        return redirect()->route('sms-logs.index')->with('success', 'SMS deleted');
    }

    /**
     * Delete all SMS logs.
     */
    public function truncate()
    {
        SmsLog::truncate();
        return redirect()->route('sms-logs.index')->with('success', 'All SMS logs cleared');
    }

    /**
     * API endpoint to get latest SMS (for AJAX refresh).
     */
    public function latest()
    {
        $smses = SmsLog::orderBy('created_at', 'desc')->limit(10)->get();
        return response()->json($smses);
    }
}
