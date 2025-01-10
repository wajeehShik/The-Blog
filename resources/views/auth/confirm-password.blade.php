<x-front-layout>
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-md-3">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">confirm password</h3>
            <form action="{{ route('password.confirm') }}" method="post" style="width:640px;">
                @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label for="email">password *</label>
     <input type="password" name="password"  placeholder="Enter User password" required autofocus  autocomplete="current-password" />
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
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