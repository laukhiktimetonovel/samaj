@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <div class="flex items-center gap-4 mb-4">
        <h2 class="font-semibold text-xl md:text-2xl text-[#575228]">પ્રોફાઇલ સેટિંગ્સ</h2>
        <form action="{{ route('family.logout') }}" method="POST">
            @csrf
            <button class="flex items-center gap-2 cursor-pointer border border-gray-400 rounded-xl py-2 px-4 bg-white">
                <p class="text-[#fc0005] font-semibold">Logout</p>
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="25" height="25" fill="#fc0005" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M5.636 5.636A9.004 9.004 0 0 1 16.5 4.204a1 1 0 0 1-1 1.731 7 7 0 1 0 0 12.13 1 1 0 0 1 1 1.731 9.001 9.001 0 0 1-10.864-1.432 9 9 0 0 1 0-12.728zm12.657 2.657a1 1 0 0 1 1.414 0l1.891 1.891c.179.179.353.352.488.512.148.175.308.396.402.686a2 2 0 0 1 0 1.236 2.02 2.02 0 0 1-.402.687 9.18 9.18 0 0 1-.488.511l-1.89 1.891a1 1 0 0 1-1.415-1.414L19.586 13H12a1 1 0 1 1 0-2h7.586l-1.293-1.293a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </button>
        </form>
    </div>
    {{-- Main Member Edit Card --}}
    <div class="bg-white rounded-[12px] p-4 flex flex-col gap-2 border border-gray-400 max-w-md">
        <span class="text-[#575228] font-semibold">મુખ્ય સભ્ય ની માહિતી સુધારો</span>
        <div class="flex items-center gap-2 mt-2">
            <p class="font-semibold">{{ $member->full_name }}</p>
            <a href="{{ route('family.profile.editMain',$member) }}">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="25" height="25" viewBox="0 0 24 24"><g fill="#616161" fill-rule="evenodd" clip-rule="evenodd"><path d="M7 4a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-6a1 1 0 1 1 2 0v6a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5h6a1 1 0 1 1 0 2z"/><path d="M17.216 2.82a2.803 2.803 0 0 1 3.963 3.964l-.783.784a1 1 0 0 1-1.414 0l-2.55-2.55a1 1 0 0 1 0-1.414zm-2.198 3.612a1 1 0 0 0-1.414 0l-4.461 4.462a1 1 0 0 0-.263.464l-.85 3.4a1 1 0 0 0 1.213 1.212l3.399-.85a1 1 0 0 0 .464-.263l4.462-4.461a1 1 0 0 0 0-1.414z"/></g></svg>
            </a>
        </div>
    </div>
    <div class="flex justify-end mt-6 max-w-md">
        <a href="{{ route('family.child.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-[12px] hover:bg-green-600 transition">
            + નવા સભ્ય ઉમેરો
        </a>
    </div>
    {{-- Family Members List --}}
    <h2 class="font-semibold text-xl md:text-2xl text-[#575228] mt-3">ઘરના સદસ્ય</h2>
    <p class="mt-1 text-red-600">નોંધ: સભ્યનું નામ પકડીને ડ્રેગ હેન્ડલ (બાજુનું આઇકન) વડે તેનો ક્રમ ઉપર કે નીચે કરી શકો છો. ક્રમ બદલ્યા પછી ફેરફાર સેવ કરવા સેવ નું બટન દબાવવું.</p>
    <form action="{{ route('family.profile.order') }}" method="POST" class="mt-4">
        @csrf
        <div id="gridContainer" class="grid grid-cols-1 gap-4 max-w-md">
            @foreach($children as $child)
            <div class="flex items-center gap-4 cursor-grab" draggable="true" data-id="{{ $child->id }}">
                <div class="bg-white rounded-[12px] p-4 md:p-4 flex gap-2 border border-gray-400 flex-row items-center justify-between flex-1">
                    <p class="text-[#575228] md:text-xl font-semibold">{{ $child->full_name }}</p>
                    <div class="flex gap-4">
                        <a href="{{ route('family.child.edit', $child) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="25" height="25" viewBox="0 0 24 24"><g fill="#616161" fill-rule="evenodd" clip-rule="evenodd"><path d="M7 4a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-6a1 1 0 1 1 2 0v6a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5h6a1 1 0 1 1 0 2z"/><path d="M17.216 2.82a2.803 2.803 0 0 1 3.963 3.964l-.783.784a1 1 0 0 1-1.414 0l-2.55-2.55a1 1 0 0 1 0-1.414zm-2.198 3.612a1 1 0 0 0-1.414 0l-4.461 4.462a1 1 0 0 0-.263.464l-.85 3.4a1 1 0 0 0 1.213 1.212l3.399-.85a1 1 0 0 0 .464-.263l4.462-4.461a1 1 0 0 0 0-1.414z"/></g></svg>
                        </a>
                        <button class="cursor-pointer" type="button" onclick="deleteChild({{ $child->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="25" height="25" viewBox="0 0 512 512"><path fill="#fc0005" fill-rule="evenodd" d="M170.8 14.221A14.21 14.21 0 0 1 185 .014L326.991.006a14.233 14.233 0 0 1 14.2 14.223v35.117H170.8zm233.461 477.443a21.75 21.75 0 0 1-21.856 20.33H127.954a21.968 21.968 0 0 1-21.854-20.416L84.326 173.06H427.5l-23.234 318.6zm56.568-347.452H51.171v-33A33.035 33.035 0 0 1 84.176 78.2l343.644-.011a33.051 33.051 0 0 1 33 33.02v33zm-270.79 291.851a14.422 14.422 0 1 0 28.844 0V233.816a14.42 14.42 0 0 0-28.839-.01v202.257zm102.9 0a14.424 14.424 0 1 0 28.848 0V233.816a14.422 14.422 0 0 0-28.843-.01z" data-original="#fc0005"/></svg>
                        </button>
                    </div>
                </div>
                <span class="cursor-grab drag-div">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="30" height="30" viewBox="0 0 25 25"><g fill="#616161"><path d="M8.861 9.176a.5.5 0 0 1-.437-.257 3.948 3.948 0 0 1-.517-1.935c0-2.206 1.794-4 4-4s4 1.794 4 4c0 .33-.049.662-.154 1.048a.494.494 0 0 1-.614.351.501.501 0 0 1-.35-.614c.08-.298.118-.547.118-.785 0-1.654-1.346-3-3-3s-3 1.346-3 3c0 .495.132.983.391 1.45a.5.5 0 0 1-.437.742zm-3.454 1.808a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 1 0v8a.5.5 0 0 1-.5.5z"/><path d="M7.406 4.984a.502.502 0 0 1-.354-.146L5.406 3.191 3.76 4.838a.5.5 0 0 1-.707-.707l2-2a.5.5 0 0 1 .707 0l2 2a.5.5 0 0 1-.354.853zm-.798 9.678c-.416 0-.83.16-1.14.468a.5.5 0 0 0 0 .707l7.12 7.122a3.481 3.481 0 0 0 2.477 1.025h2.342c2.481 0 4.5-2.019 4.5-4.5v-5.5a1.001 1.001 0 0 0-2 0v.5a.5.5 0 0 1-1 0v-1.5a1.001 1.001 0 0 0-2 0v1.5a.5.5 0 0 1-1 0v-2.5a1.001 1.001 0 0 0-2 0v2.5a.5.5 0 0 1-1 0v-7.5a1.001 1.001 0 0 0-2 0v9.5a.5.5 0 0 1-.8.4l-2.536-1.903a1.602 1.602 0 0 0-.963-.319z"/></g></svg>
                </span>
            </div>
            @endforeach
        </div>

        <input type="hidden" name="order" id="orderInput" />
        <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] mt-4 cursor-pointer">સેવ કરો</button>
    </form>

    <!-- Hidden forms for delete actions -->
    @foreach($children as $child)
    <form id="delete-form-{{ $child->id }}" action="{{ route('family.child.destroy', $child) }}" method="POST" style="display: none;">
        @csrf @method('DELETE')
    </form>
    @endforeach
</div>
@push('scripts')
  <script>
      const grid = document.getElementById('gridContainer');
      let dragged;

      grid.addEventListener('dragstart', e => {
          dragged = e.target.closest('[draggable]');
          if (dragged) {
              e.dataTransfer.effectAllowed = 'move';
              dragged.classList.add('opacity-50');
          }
      });

      grid.addEventListener('dragend', () => {
          if (dragged) {
              dragged.classList.remove('opacity-50');
              dragged = null;
          }
      });

      grid.addEventListener('dragover', e => {
          e.preventDefault();
          const elements = [...grid.querySelectorAll('[draggable]')];
          const after = elements.find(child => {
              const box = child.getBoundingClientRect();
              return e.clientY < box.top + box.height / 2;
          });
          if (after && after !== dragged) {
              grid.insertBefore(dragged, after);
          } else if (!after) {
              grid.appendChild(dragged);
          }
      });

      document.querySelector('form[action="{{ route('family.profile.order') }}"]').addEventListener('submit', e => {
          const order = [...grid.querySelectorAll('[draggable]')].map(div => div.dataset.id);
          document.getElementById('orderInput').value = JSON.stringify(order);
      });

      function deleteChild(id) {
          if (confirm('શું તમે ખરેખર આ સભ્યને કાઢી નાખવા માંગો છો?')) {
              document.getElementById(`delete-form-${id}`).submit();
          }
      }
  </script>
@endpush
@endsection
