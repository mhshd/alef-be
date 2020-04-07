@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ساخت پست جدید</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">عنوان پست : </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">متن پست : </label>
                                <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" >ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
