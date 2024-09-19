@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">My Complaints <span>Points: {{ auth()->user()->points }}</span></h1>

        <!-- Display the flash message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-xl font-bold mb-4">Submit a New Complaint</h2>
        <form action="{{ route('complaint.submit') }}" method="POST">
            @csrf
            <textarea name="complaint" class="w-full p-2 border border-gray-300 rounded mb-4" required></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Complaint</button>
        </form>

        <h2 class="text-xl font-bold mt-8 mb-4">Previous Complaints</h2>
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Complaint</th>
                <th class="px-4 py-2">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($complaints as $complaint)
                <tr>
                    <td class="border px-4 py-2">{{ $complaint->complaint }}</td>
                    <td class="border px-4 py-2">{{ $complaint->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
