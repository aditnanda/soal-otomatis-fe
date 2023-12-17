<x-guest-layout>
    <div id="auth-left">

        <h1 class="auth-title">Forgot</h1>
        <p class="">Input your wa number and we will send you token.</p>
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
        <form action="{{ route('password.wa') }}" method="POST">
            @csrf

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="number" class="form-control form-control-xl" placeholder="WA" value="{{ old('phone') }}" name="phone" required>
                <div class="form-control-icon">
                    <i class="bi bi-phone"></i>
                </div>
            </div>
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Request Now</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600' style="font-size: 17px">Already have token? <a href="{{ route('password.reset')}}" class="font-bold">Forgot Now</a>.
            </p>
            <p class='text-gray-600' style="font-size: 17px">Forgot via Email? <a href="{{ route('password.request')}}" class="font-bold">Forgot via Email</a>.
            </p>
            <p class='text-gray-600' style="font-size: 17px">Remember your account? <a href="{{ route('login')}}" class="font-bold">Log
                    in</a>.
            </p>
        </div>
        <div class="text-center mt-5 text-lg fs-4">
            
        </div>
    </div>
   
</x-guest-layout>
