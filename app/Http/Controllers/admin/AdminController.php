<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showPatients()
    {
        $patients = $this->userRepository->getAllPatients();

        return view('admin.patients', compact('patients'));
    }

    public function approvePatient($id)
    {
        $this->userRepository->approvePatient($id);
        return redirect()->back()->with('success', 'Patient approved successfully');
    }

    public function rejectPatient($id)
    {
        $this->userRepository->rejectPatient($id);
        return redirect()->back()->with('success', 'Patient rejected successfully');
    }


    // Shows approved patients
    public function showApprovedPatients()
    {
        $patients = $this->userRepository->getAllPatients();
        return view('admin.approved_patients', compact('patients'));
    }


}
