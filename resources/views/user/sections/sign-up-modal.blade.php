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
                            <h3>{{ __('Create Account') }}</h3>
                        </div>
                        <form action="https://demo.graygrids.com/">
                            <div class="form-group">
                                <label for="email" class="label">{{ __('Last Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Enter your last name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="label">{{ __('First Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Enter your first name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="label">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" placeholder="+998 99 999 99 99">
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">{{ __('Password') }}</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" placeholder="{{ __('Enter password') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">{{ __('Confirm Password') }}</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" placeholder="{{ __('Enter password') }}">
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