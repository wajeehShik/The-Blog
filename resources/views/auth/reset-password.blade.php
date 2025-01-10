<x-front-layout>
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-md-3">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Update password</h3>
            <form action="{{ route('password.update') }}" method="post" style="width:640px;">
                @csrf
                <div class="account__form">
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="input__box">
                    <label for="email">email *</label>
<input type="text" name="email" value="{{old('email')}}" placeholder="Enter User Name" required/>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                <div class="input__box">
                    <label for="password">password *</label>
<input type="text" name="password" placeholder="Enter User password" required/>
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="input__box">
                    <label for="password">password *</label>
<input type="text" name="password_confirmation" placeholder="Enter User password confirmation" required/>
                    @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                        <div class="account__form">
                           
                            <div class="form__btn">
                                <button>Confirm</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>