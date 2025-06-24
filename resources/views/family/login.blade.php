@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
  <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">નવો સભ્ય ઉમેરો</h2>
  <div class="max-w-xl space-y-4">
    @if(session('status'))
      <div class="text-green-600">{{ session('status') }}</div>
    @endif

    <form action="{{ route('family.login') }}" method="POST" id="login-form" class="space-y-2">
      @csrf
      <label class="block text-gray-700 font-semibold">લોગિન માટે મોબાઈલ નંબર અને પાસવર્ડ દાખલ કરો:</label>
      <div class="flex flex-col sm:flex-row gap-3">
        <!-- Mobile Field -->
        <div class="flex-1">
          <input name="mobile" type="number" maxlength="10"
            oninput="this.value=this.value.slice(0,10)" 
            value="{{ old('mobile', session('mobile')) }}"
            placeholder="મોબાઈલ નંબર દાખલ કરો"
            class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
          <div id="mobile-error" class="text-red-500 text-sm mt-1 hidden"></div>
          @error('mobile')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
        </div>
      </div>
      <div class="flex flex-col sm:flex-row gap-3">
        <!-- Password Field -->
        <div class="flex-1">
          <input name="password" type="password" placeholder="પાસવર્ડ દાખલ કરો"
            class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
          <div id="password-error" class="text-red-500 text-sm mt-1 hidden"></div>
          @error('password')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
        </div>
      </div>
      <div class="flex justify-end">
        <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px]">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('login-form');
    const mobileInput = document.querySelector('input[name="mobile"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const mobileError = document.getElementById('mobile-error');
    const passwordError = document.getElementById('password-error');

    // Limit mobile input to 10 digits
    mobileInput.addEventListener('input', function () {
      if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
      }
    });

    // Form submission validation
    form.addEventListener('submit', function (e) {
      let isValid = true;

      // Reset error messages
      mobileError.classList.add('hidden');
      passwordError.classList.add('hidden');
      mobileError.textContent = '';
      passwordError.textContent = '';

      // Validate mobile
      if (!mobileInput.value.trim()) {
        mobileError.textContent = 'મોબાઈલ નંબર આવશ્યક છે.';
        mobileError.classList.remove('hidden');
        isValid = false;
      } else if (mobileInput.value.length !== 10) {
        mobileError.textContent = 'મોબાઈલ નંબર 10 અંકનો હોવો જોઈએ.';
        mobileError.classList.remove('hidden');
        isValid = false;
      }

      // Validate password
      if (!passwordInput.value.trim()) {
        passwordError.textContent = 'પાસવર્ડ આવશ્યક છે.';
        passwordError.classList.remove('hidden');
        isValid = false;
      }

      if (!isValid) {
        e.preventDefault();
      }
    });
  });
</script>
@endpush