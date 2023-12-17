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
        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email') }}" name="email" required>
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Request Now</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600' style="font-size: 17px">Already have token? <a href="{{ route('password.reset')}}" class="font-bold">Forgot Now</a>.
            </p>
            <p class='text-gray-600' style="font-size: 17px">Forgot via Whatsapp? <a href="{{ route('password.request.wa')}}" class="font-bold">Forgot via WA</a>.
            </p>
            <p class='text-gray-600' style="font-size: 17px">Remember your account? <a href="{{ route('login')}}" class="font-bold">Log
                    in</a>.
            </p>
        </div>
        <div class="text-center mt-5 text-lg fs-4">
            
        </div>
    </div>
   
</x-guest-layout>
