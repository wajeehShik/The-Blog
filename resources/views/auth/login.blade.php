<x-front-layout>
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-md-3">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">تسجيل الدخول</h3>
            <form action="{{route('login')}}" method="post" style="width:640px;">
                @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label for="email">ايميل *</label>
     <input type="text" name="email" value="{{old('email')}}" placeholder="الرجاء ادخال الايميل" required/>
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="input__box">
                                <label for="password"> كلمة السر</label>
                                <input type="password" name="password" placeholder="الرجاء ادخال كلمة سر">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form__btn">
                                <button>دخول</button>
                                <label class="label-for-checkbox">
                                    <input class="input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span> تذكرني</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="{{ route('password.request') }}">هل نسيت كلمة السر؟</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>