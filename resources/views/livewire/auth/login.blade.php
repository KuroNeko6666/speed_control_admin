<div>
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo">
            <img src="/images/logo.svg" alt="logo">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="fw-light">Sign in to continue.</h6>
        @if (session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="pt-3" wire:submit.prevent='submit'>
            <div class="form-group">
                <input wire:model='email' type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    placeholder="Username">
                @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input wire:model='password' type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    id="exampleInputPassword1" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                    IN</button>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                    </label>
                </div>
                <a href="#" class="auth-link text-black">Forgot password?</a>
            </div>
            <div class="mb-2">
                <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook me-2"></i>Connect using facebook
                </button>
            </div>
            <div class="text-center mt-4 fw-light">
                Don't have an account? <a href="/register" class="text-primary">Create</a>
            </div>
        </form>
    </div>
</div>
