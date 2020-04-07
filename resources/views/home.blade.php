@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (is_object($posts))
                <table class="table table-striped">
                    <thead>
                    <th>تاریخ انتشار</th>
                    <th>عنوان</th>
                    <th>نمایش مطلب</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-dark butt">ادامه مطلب</a>
                            </td>
                            @if(Auth::check())
                                <td>
                                    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-dark butt">حذف مطلب</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                @else
                    <div class="card-body">
                       تا کنون مطلبی در این سایت منتشر نشده است
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
