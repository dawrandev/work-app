<div class="modal fade form-modal" id="signup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button"
            class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
            data-dismiss="modal"><i class="lni lni-close"></i></button>
        <div class="login-modal-main">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="row">
                        <div class="heading">
                            <h3>{{ __('Create account') }}</h3>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="label">{{ __('First name') }}</label>
                                <input type="text" name="first_name" class="form-control" placeholder="{{ __('Enter your first name') }}" value="{{ old('first_name') }}">
                                @error('first_name')
                                <li style="color: red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="label">{{ __('Last name') }}</label>
                                <input type="text" name="last_name" class="form-control" placeholder="{{ __('Enter your last name') }}" value="{{ old('last_name') }}">
                                @error('last_name')
                                <li style="color: red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="label">{{ __('Phone') }}</label>
                                <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <li style="color: red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">{{ __('Password') }}</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('Enter password') }}" value="{{ old('password') }}">
                                    @error('password')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">{{ __('Confirm password') }}</label>
                                <div class="position-relative">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Enter password') }}" value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-8 button">
                                <button class="btn">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
@if ($errors->any() && session('form') === 'register')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var signupModal = new bootstrap.Modal(document.getElementById('signup'));
        signupModal.show();
    });
</script>
@endif
@endpush