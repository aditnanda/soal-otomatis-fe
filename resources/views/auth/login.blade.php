<x-guest-layout>

    <div id="auth-left">
        <h3 style="color: #161A4D"><br>myITS</h3>
        <h4 style="color: #161A4D"><i>Classroom</i></h4>
        <h1 class="auth-title">Log in.</h1>
        {{-- <p class="">Log in with your data.</p> --}}

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
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input class="form-control form-control-xl" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password" placeholder="Password"
                    placeholder="Password" id="password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <input type="checkbox" onclick="myFunction()"> Show Password

            {{-- <div class="form-check form-check-lg d-flex align-items-end">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="flexCheckDefault">
                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                    Keep me logged in
                </label>
            </div> --}}
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Log in</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            @if (Route::has('register'))
            <p class="text-gray-600">Don't have an account? <a href="{{route('register')}}" class="font-bold">Sign
                    up</a>.</p>
            @endif


            @if (Route::has('password.request'))
            <p style="font-size: 17px"><a class="font-bold" href="{{route('password.request')}}">Forgot password?</a>.</p>
            @endif
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
</x-guest-layout>
