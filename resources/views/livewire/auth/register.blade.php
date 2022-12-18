<div>
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo">
            <img src="/images/logo.svg" alt="logo">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="fw-light">Sign up to continue.</h6>
        <form class="pt-3" wire:submit.prevent='submit'>
            <div class="form-group">
                <input wire:model='name' type="name"
                    class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Username">
                @error('name')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input wire:model='email' type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <select wire:model='role'
                    class="form-control form-control-lg ps-4 @error('role') is-invalid border-danger @enderror"
                    placeholder="Password">
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                </select>
                @error('role')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input wire:model='password' type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                    UP</button>
            </div>
            <div class="text-center mt-4 fw-light">
                Have an account? <a href="/login" class="text-primary">SIGN IN</a>
            </div>
        </form>
    </div>
</div>
