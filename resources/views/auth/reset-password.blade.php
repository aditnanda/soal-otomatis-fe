<x-guest-layout>
    <div id="auth-left">

        <h1 class="auth-title">Forgot</h1>
        <p class="">Input your email and we will send you token.</p>
        @if (session('status'))
        <div class="alert alert-warning mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

            <div class="form-group position-relative has-icon-left mb-4">
                <label for="email" value="{{ __('Email') }}" />
                <input id="email" class="form-control  form-control-xl" type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Email"/>
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
                <label for="token" value="{{ __('Token') }}" />
                <input id="token" class="form-control  form-control-xl" type="text" name="token" :value="old('token', $request->token)" required autofocus placeholder="Token"/>
                <div class="form-control-icon">
                    <i class="bi bi-key"></i>
                </div>
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
                <label for="password" value="{{ __('Password') }}" />
                <input id="password" class="form-control  form-control-xl" type="password" name="password" id="password" required autocomplete="new-password" placeholder="New Password"/>
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <input type="checkbox" onclick="myFunction()"> Show Password
            <p><br></p>
            <div class="form-group position-relative has-icon-left mb-4">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="form-control  form-control-xl" type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder="New Password Confirmation"/>
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <input type="checkbox" onclick="myFunction2()"> Show Password Confirmation
            <p><br></p>
            <div class="flex items-center justify-end mt-4">
                <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            
            <p class='text-gray-600' style="font-size: 17px">Remember your account? <a href="{{ route('login')}}" class="font-bold">Log
                    in</a>.
            </p>
        </div>
        <div class="text-center mt-5 text-lg fs-4">
            
        </div>
    </div>
    <script>
        function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>

<script>
    function myFunction2() {
var x = document.getElementById("password_confirmation");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>
</x-guest-layout>
