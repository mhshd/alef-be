@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }

</style>
@section('content')

    <div class="container" style="direction: rtl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{ route('update') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label" style="float: right">عنوان پست : </label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}" required />
                        </div>
                        <div class="form-group">
                            <label class="label" style="float: right">متن پست : </label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required>{{$post->body}}</textarea>
                        </div>
                        <ul class="navbar-nav mr-auto dropdown-item" style="direction: rtl">
                            <p style="text-align: right">این مطلب مربوط به کدام حوزه است؟</p>
                            <select name="typeChoice">
                                <option id="id" value="{{$post->id}}">شناسه مقاله</option>
                            </select>

                        </ul>

                        <div class="form-group" style="position: center">
                            <button type="submit" id = {{$post->id}}>ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
