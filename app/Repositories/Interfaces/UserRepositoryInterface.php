<?php

namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function getAllPatients();

    public function approvePatient($id);

    public function rejectPatient($id);

    public function deductPoints($id, $points);

    public function findById($id);
}
