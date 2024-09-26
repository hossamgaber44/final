<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/final_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">
    <title>login</title>
</head>

<body dir="rtl">
    <main>
        <section class="register">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="register_title">{{ __('Login') }}</h1>
                <div class="register_content">
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
                </div>
                <div class="btns">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"> انشاءحساب جديد؟</a>
                    @endif
                    <button class="register_btn">تسجيل الدخول</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
