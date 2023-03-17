<div>
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
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo h3">
            <span>Speed</span><span class="text-primary">Control</span>
        </div>
        <h6 class="fw-light">Login untuk melanjutkan.</h6>
        <form class="pt-3" wire:submit.prevent='submit'>
            <div class="form-group">
                <input wire:model='email' type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    placeholder="Email">
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
                <button type="submit"
                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
            </div>
            <div class="text-center mt-4 fw-light">
                Tidak punya akun? <a href="/register" class="text-primary">Daftar</a>
            </div>
        </form>
    </div>
</div>
