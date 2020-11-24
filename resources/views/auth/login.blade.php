<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سوق الدواء الليبي</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">    <link rel="stylesheet" href="{{asset('authstyles/css/login.css')}}">
</head>
<body dir="rtl">
<main>
    <div class="container-fluid">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="login-wrapper my-auto">
                        <h2>سوق الدواء الليبي</h2>

                        <h1 class="login-title">تسجيل الدخول</h1>
                        <form action="#!">
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">كلمة المرور</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            @if (!empty($error))
                            <span class="help-block" role="alert">
                              <small>اسم المستخدم أو كلمة المرور غير صحيحة</small>
                            </span>
                            @endif


                            <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="دخول">
                        </form>
                        <p class="login-wrapper-footer-text">لا تملك حساباً? <a href="{{route('registershow')}}" class="text-reset">سجل
                                الآن</a></p>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{asset('authstyles/images/background3-1.jpg')}}" alt="login image" class="login-img">
                </div>
            </div>
        </form>

    </div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
