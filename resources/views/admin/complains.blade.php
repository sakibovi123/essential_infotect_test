@extends('layouts.app')

@section('content')
    <div class="border rounded shadow-xl container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">All Complaints</h1>
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Patient</th>
                <th class="px-4 py-2">Complaint</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($complaints as $complaint)
                <tr>
                    <td class="border px-4 py-2">{{ $complaint->user->name }}</td>
                    <td class="border px-4 py-2">{{ $complaint->complaint }}</td>
                    <td class="border px-4 py-2 uppercase text-center">
                        @if( $complaint->status == 'solved' )
                            <p class="rounded p-2 bg-green-400">SOLVED</p>
                        @else
                            <p class="rounded p-2 bg-yellow-400">{{ $complaint->status }}</p>
                        @endif

                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('complaint.update', ['id' => $complaint->id, 'status' => 'Solved']) }}" method="POST">
                            @csrf
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Mark as Solved</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
