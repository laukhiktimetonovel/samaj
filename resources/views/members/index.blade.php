@extends('layouts.app')

@section('content')
  <div class="flex items-center justify-between mb-6">
    <h2 class="font-semibold text-xl md:text-2xl text-[#575228]">All Members</h2>
    <a href="{{ route('members.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
      Add New Member
    </a>
  </div>

  <div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Relation</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Parent</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gam Name</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($members as $member)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $member->full_name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $member->relation }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              {{ $member->parent ? $member->parent->full_name : '—' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $member->village_name ?? '—' }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
              No members found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
