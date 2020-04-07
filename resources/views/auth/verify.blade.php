@extends('layouts.app')

@section('content')
<div class="container" style="direction: rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: right">{{ __('آدرس ایمیل خود را تایید کنید') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('لینک تایید برای ایمیل شما ارسال شد') }}
                        </div>
                    @endif

                    {{ __('لطفا قبل از ادامه کار ایمیل خود را تایید کنید') }}
                    {{ __('اگر ایمیلی دریافت نکردید') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('دوباره لینک تایدد ارسال شود') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
