@extends('layouts.app')
@section('content')
    <div class="card" style="margin:0 auto; padding-top: 10px">
        <div class="card-heading" style="text-align: center; font-size: larger">تغییر اطلاعات کاربر</div>
        <div class="card-body">
            <div class="row">
    <form action="{{route('ChangeUserProfile')}}" method="post" style="direction: rtl; alignment: center" class="col-md-8">
        @csrf
        <div>
        <label for="name" class="col-md-4">نام کاربری </label>
        <input type="text" id="name" name="name">
        </div>
        <div>
        <label for="email" class="col-md-4">آدرس ایمیل</label>
        <input type="text" id="email" name="email">
        </div>
        <div>
        <label for="password" class="col-md-4">رمز عبور</label>
        <input type="password" id="password" name="password">
        </div>
        <button class="btn btn-success">تغییر اطلاعات کاربری</button>
    </form>

                <div class="col-md-4">
                    <button class="btn btn-primary" disabled id="IncreaseBalance">افزایش اعتبار </button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $("#IncreaseBalance").click(function() {
        alert( "در حال حاضر امکان افزایش اعتبار وجود ندارد" );
    });
</script>
