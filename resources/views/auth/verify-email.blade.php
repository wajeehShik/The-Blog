<x-front-layout>
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-md-3">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Update password</h3>
            <form action="{{ route('verification.send') }}" method="post" style="width:640px;">
                @csrf
                <div class="account__form">
                            <div class="form__btn">
                                <h2 class="mb-4">شكرا لانك وصلت هنا</h2>
                                <button>Verfiy Email</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>