@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Pending Patient Registrations</h1>

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
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                @if(!$patient->is_approved) <!-- Show only unapproved patients -->
                <tr>
                    <td class="border px-4 py-2">{{ $patient->name }}</td>
                    <td class="border px-4 py-2">{{ $patient->email }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <form action="{{ route('admin.patient.approve', $patient->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-slate-900 bg-green-400 font-bold uppercase px-4 py-2 rounded">Approve</button>
                        </form>
                        <form action="{{ route('admin.patient.reject', $patient->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-400 text-slate-900 font-bold uppercase px-4 py-2 rounded">Reject</button>
                        </form>
                    </td>
                </tr>

                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
