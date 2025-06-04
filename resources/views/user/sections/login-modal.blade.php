<div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button"
            class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
            data-dismiss="modal"><i class="lni lni-close"></i></button>
        <div class="login-modal-main">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="row">
                        <div class="heading">
                            <h3>{{__('Login')}}</h3>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="phone" class="label">{{__('Phone')}}</label>
                                <input type="text" name="phone" class="form-control" placeholder="99 999 99 99" id="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <li style="color: red;">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">{{__('Password')}}</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="{{__('Enter password')}}" value="{{ old('password') }}">
                                    @error('password')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between">
                                <!-- Default checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox" value="{{ old('remember') }}"
                                        id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">{{__('Remember password')}}</label>
                                </div>
                                <a href="#" class="font-size-3 text-dodger line-height-reset">{{__('Forget Password')}}</a>
                            </div>
                            <div class="form-group mb-8 button">
                                <button class="btn ">{{__('Log in')}}
                                </button>
                            </div>
                            <p class="text-center create-new-account">{{__('Don’t have an account? ')}}<a href="javacript:" data-toggle="modal" data-target="#signup">{{__('Create a free account')}}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>