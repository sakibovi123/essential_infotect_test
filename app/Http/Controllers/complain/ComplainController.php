<?php

namespace App\Http\Controllers\complain;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function submitComplaint(Request $request)
    {
        $request->validate([
            'complaint' => 'required|string'
        ]);

        $user = auth()->user();
        $complaint = new Complain();
        if ( $user->points > 0 ) {
            $complaint->user_id = $user->id;
            $complaint->complaint = $request->complaint;
            $complaint->save();

            // Deduct points after complaint submission
            $this->userRepository->deductPoints(auth()->user()->id, 5);

            return redirect()->back()->with('success', 'Complaint submitted successfully');
        }
        else {
            return redirect()->back()->with('error', 'Not enough points');
        }

    }


    public function viewAllComplaints()
    {
        $complaints = Complain::all();
        return view('admin.complains', compact('complaints'));
    }

    public function updateComplaintStatus($id, $status)
    {
        $complaint = Complain::findOrFail($id);
        $complaint->status = $status;
        $complaint->save();

        return redirect()->back()->with('success', 'Complaint status updated');
    }

    public function viewMyComplaints()
    {
        $complaints = Complain::where('user_id', auth()->user()->id)->get();
        return view('patient.complains', compact('complaints'));
    }

}
