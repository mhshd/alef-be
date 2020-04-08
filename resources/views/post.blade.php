@extends('layouts.app')
@section('content')
    <div class="container" style="direction: rtl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: right">ساخت پست جدید</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label" style="float: right">عنوان پست : </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label" style="float: right">متن پست : </label>
                                <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <ul class="navbar-nav mr-auto dropdown-item" style="direction: rtl">
                                <p style="text-align: right">این مطلب مربوط به کدام حوزه است؟</p>
                                <select name="typeChoice">
                                    <option id="critic" value="0">نقد ادبی</option>
                                    <option id="introduce" value="1">معرفی کتاب</option>
                                    <option id="draft" value="2">دستنوشته</option>
                                    <option id="teach" value="3">دستنوشته</option>
                                </select>

                            </ul>

                            <div class="form-group" style="position: center">
                                <button type="submit" >ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
