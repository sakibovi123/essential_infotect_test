@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Approved Patients</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Points</th>
                <th class="px-4">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                @if($patient->is_approved) <!-- Show only approved patients -->
                <tr>
                    <td class="border px-4 py-2">{{ $patient->name }}</td>
                    <td class="border px-4 py-2">{{ $patient->email }}</td>
                    <td class="border px-4 py-2">{{ $patient->points }} points</td>
                    <td class="border px-4 py-2">
                        @if($patient->is_approved == 1)
                            ACTIVE
                        @else
                            REJECTED
                        @endif

                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
