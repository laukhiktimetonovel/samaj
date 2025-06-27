@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
  <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">નવો સભ્ય ઉમેરો</h2>
  <div class="max-w-xl space-y-4">
    @if(session('status'))
      <div class="text-green-600">{{ session('status')}}</div>
    @endif

    {{-- Send OTP --}}
    <form id="send-otp-form" action="{{ route('family.login.sendOtp') }}" method="POST" class="space-y-2">
      @csrf
      <label class="block text-gray-700 font-semibold">નવો સભ્ય ઉમેરવા મોબાઈલ નંબર દાખલ કરો:</label>
      <div class="flex flex-col sm:flex-row gap-3">
        <input name="mobile" type="number" maxlength="10"
          oninput="this.value=this.value.slice(0,10)" 
          value="{{ old('mobile', session('mobile')) }}"
          placeholder="મોબાઈલ નંબર દાખલ કરો"
          class="flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none  focus:border-[#575228]" />
        <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px]">Send OTP</button>
      </div>
      @error('mobile')<div class="text-red-500">{{ $message }}</div>@enderror
    </form>

    {{-- Verify OTP --}}
    <form id="otp-form" action="{{ route('family.login.verify') }}" method="POST" class="space-y-2" style="display: none;">
      @csrf
      <label class="block text-gray-700 font-semibold">OTP નંબર દાખલ કરો:</label>
      <div class="flex flex-col sm:flex-row gap-3">
        <input name="mobile" type="hidden" value="{{ old('mobile', session('mobile')) }}" />
        <input name="otp" type="number" placeholder="OTP નંબર દાખલ કરો"
          class="flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none  focus:border-[#575228]" />
        <button class="bg-[#575228] text-white px-5 py-2 rounded-[12px]">Login</button>
      </div>
      @error('otp')<div class="text-red-500">{{ $message }}</div>@enderror
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const otpForm = document.getElementById('otp-form');
    const mobileInput = document.querySelector('input[name="mobile"]');
    const sendOtpForm = document.getElementById('send-otp-form');

    // Show OTP form if already has mobile in session
    if (mobileInput.value.length === 10) {
      otpForm.style.display = 'block';
    }

    // Prevent form submission if mobile number is not 10 digits
    sendOtpForm.addEventListener('submit', function (e) {
      if (mobileInput.value.length !== 10) {
        e.preventDefault();
        alert("મોબાઈલ નંબર 10 અંકનો હોવો જોઈએ.");
        return;
      }
      otpForm.style.display = 'block';
    });

    // Limit input to 10 digits only (also works on mobile)
    mobileInput.addEventListener('input', function () {
      if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
      }
    });
  });
</script>
@endpush
