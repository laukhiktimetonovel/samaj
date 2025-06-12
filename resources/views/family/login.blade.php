@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
  <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">નવો સભ્ય ઉમેરો</h2>
  <div class="max-w-xl space-y-4">
    @if(session('status'))
      <div class="text-green-600">{{ session('status')}}</div>
    @endif

    {{-- Send OTP --}}
    <form action="{{ route('family.login.sendOtp') }}" method="POST" class="space-y-2">
      @csrf
      <label class="block text-gray-700 font-semibold">નવો સભ્ય ઉમેરવા મોબાઈલ નંબર દાખલ કરો:</label>
      <div class="flex flex-col sm:flex-row gap-3">
        <input name="mobile" type="number" value="{{ old('mobile', session('mobile')) }}"
          placeholder="મોબાઈલ નંબર દાખલ કરો"
          class="flex-1 px-5 py-3 border rounded-[12px] focus:ring-[#B3541E]" />
        <button class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px]">Send OTP</button>
      </div>
      @error('mobile')<div class="text-red-500">{{ $message }}</div>@enderror
    </form>

    {{-- Verify OTP --}}
    <form action="{{ route('family.login.verify') }}" method="POST" class="space-y-2 otp-form" style="display: none;">
      @csrf
      <label class="block text-gray-700 font-semibold">OTP નંબર દાખલ કરો:</label>
      <div class="flex flex-col sm:flex-row gap-3">
        <input name="mobile" type="hidden" value="{{ old('mobile', session('mobile')) }}" />
        <input name="otp" type="number" placeholder="OTP નંબર દાખલ કરો"
          class="flex-1 px-5 py-3 border rounded-[12px] focus:ring-[#B3541E]" />
        <button class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px]">Login</button>
      </div>
      @error('otp')<div class="text-red-500">{{ $message }}</div>@enderror
    </form>
  </div>
</div>
@endsection
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const otpForm = document.querySelector('.otp-form');
    otpForm.style.display = 'none'; // Hide OTP form initially
    const mobileInput = document.querySelector('input[name="mobile"]');

    if( mobileInput.value) {
      otpForm.style.display = 'block'; // Show OTP form if mobile number is already set
    }
  });
</script>
@endpush
