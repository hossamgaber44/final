<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/final_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">
    <title>register</title>
</head>

<body dir="rtl">
    <main>
        <section class="register">
            <form  method="POST" action="{{ route('register') }}" >
                @csrf

                <h1 class="register_title">{{ __('Register') }}</h1>
                <div class="register_content">
                    <div class="faild_content">
                        <label for="name">الاسم</label>
                        <input id="name" name="name" type="text" placeholder="ادخل الاسم...">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="faild_content">
                        <label for="email">الاميل</label>
                        <input id="email" name="email" type="text" placeholder="ادخل الاميل...">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="faild_content">
                        <label for="passward">كلمه المرور</label>
                        <input id="password" name="password" type="password" placeholder="كلمه المرور...">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="faild_content">
                        <label for="password_confirmation">تاكيد كلمه المرور</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="تاكيد كلمه المرور...">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="btns">
                    @if (Route::has('register'))
                        <a href="{{ route('login') }}" >امتلك حساب بالفعل؟</a>
                    @endif
                    <button class="register_btn">انشاء حساب</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
