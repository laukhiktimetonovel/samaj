@extends('layouts.app')

@section('content')
<div class="py-4 md:py-6 w-full px-4 md:min-h-screen md:overflow-y-auto">

  <div class="flex items-center justify-between">
    <h2 class="font-semibold text-2xl mb-4">પ્રોફાઇલ સેટિંગ્સ</h2>
    <form action="{{ route('family.logout') }}" method="POST">
      @csrf
      <button class="flex items-center gap-2">
        <p class="text-[#B3541E] font-semibold">Logout</p>
        <img class="max-w-[40px]" src="{{ asset('images/icons/logout.png') }}" alt="">
      </button>
    </form>
  </div>

  {{-- Main Member Edit Card --}}
  <div class="bg-white rounded-[12px] p-4 md:p-4 flex flex-col gap-2 border border-gray-200  flex flex-row justify-between items-center">
    <div>
      <span class="text-[#B3541E] font-semibold">મુખ્ય સભ્ય ની માહિતી સુધારો</span>
      <div class="flex items-center gap-2 mt-1">
        <p class="font-semibold">{{ $member->full_name }}</p>
        <a href="{{ route('family.profile.editMain',$member) }}">
          <img class="max-w-[28px]" src="{{ asset('images/icons/editicon.png') }}" alt="">
        </a>
      </div>
    </div>
  </div>
  <div class="flex justify-end mt-6">
    <a href="{{ route('family.child.create') }}"
       class="bg-green-500 text-white px-4 py-2 rounded-[12px] hover:bg-green-600 transition">
      + નવા સભ્ય ઉમેરો
    </a>
  </div>

  {{-- Family Members List --}}
  <h2 class="w-max bg-[#faebd7] mt-[50px] my-[25px] px-[11px] py-[11px] rounded-[5px] text-lg font-semibold ">ઘરના સદસ્ય</h2>
  <div class="grid grid-cols-1 gap-4">
    @foreach($children as $child)
      <div class="bg-white rounded-[12px] p-4 md:p-4 flex gap-2 border border-gray-200 flex-row items-center justify-between">
        <p class="text-[#B3541E] md:text-xl font-semibold">{{ $child->full_name }}</p>
        <div class="flex gap-4">
          <a href="{{ route('family.child.edit',$child) }}"><img class="max-w-[27px]" src="{{ asset('images/icons/editicon.png') }}"></a>
          <form action="{{ route('family.child.destroy',$child) }}" method="POST">
            @csrf @method('DELETE')
            <button><img class="max-w-[22px]" src="{{ asset('images/icons/delete.png') }}"></button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Drag & Drop Order --}}
  <h2 class="bg-[#faebd7] inline-block px-3 py-2 rounded mt-8 font-semibold">ઘરના સભ્ય નો ક્રમ બદલવા</h2>
  <form action="{{ route('family.profile.order') }}" method="POST" class="mt-4">
    @csrf
    <div id="gridContainer" class="grid grid-cols-1 gap-4">
      @foreach($children as $child)
        <div class="bg-white rounded-[12px] p-4 md:p-4 border border-gray-200 cursor-pointer cursor-move" draggable="true" data-id="{{ $child->id }}">
          <p class="text-[#B3541E] font-semibold">{{ $child->full_name }}</p>
        </div>
      @endforeach
    </div>
    <input type="hidden" name="order" id="orderInput">
    <button type="submit" class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px] mt-4">Save</button>
  </form>

  <p class="mt-5 text-red-600">નોંધ: સભ્ય નુ નામ પકડી ને તેનો ક્રમ ઉપર કે નીચે કરી શકો છો. ક્રમ બદલ્યા પછી ફેરફાર સેવ કરવા સેવ નું બટન દબાવવું.</p>
</div>

@push('scripts')
<script>
  const grid = document.getElementById('gridContainer');
  let dragged;

  grid.addEventListener('dragstart', e => {
    dragged = e.target;
    e.target.classList.add('dragging');
  });
  grid.addEventListener('dragend', e => {
    e.target.classList.remove('dragging');
  });
  grid.addEventListener('dragover', e => {
    e.preventDefault();
    const after = [...grid.querySelectorAll('[draggable]')]
      .reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = e.clientY - box.top - box.height/2;
        return offset < 0 && offset > closest.offset
          ? { offset, element: child }
          : closest;
      }, { offset: Number.NEGATIVE_INFINITY }).element;
    if (after) grid.insertBefore(dragged, after);
    else grid.appendChild(dragged);
  });

  document.querySelector('form[action="{{ route('family.profile.order') }}"]').addEventListener('submit', e => {
    const order = [...grid.children].map(div => div.dataset.id);
    document.getElementById('orderInput').value = JSON.stringify(order);
  });
</script>
@endpush
@endsection
