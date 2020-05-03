
@extends('layouts.app')
@section('content')
    <div class="container col-lg-8 col-md-8 col-ms-10 col-xl-10">
        <div class="row justify-content-center ">
            <div>
                @if (is_object($posts))
                <table class="table table-striped" style="direction: rtl">
                    <thead>
                    @if(!Auth::check())
                    <th>تاریخ انتشار</th>
                    @endif
                    <th>عنوان</th>
                    <th>تعداد بازدید</th>
                    <th>نمایش مطلب</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr style="direction: rtl; font-family : BYekan">
                             @if(!Auth::check())
                            <td style="font-family: BYekan"><?php
                            $date = $post->createdDate;
                            echo convertNumbers($date);
                            ?></td>
                            @endif
                            <td>{{ $post->title }}</td>
                            <td style="float: right">
                                <svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z" clip-rule="evenodd"/>
                                 </svg>
                                <?php
                            $date = $post->views;
                            echo convertNumbers($date);
                            ?>
                            </td>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-dark butt">ادامه مطلب</a>
                            </td>

                            @if(Auth::check())
                                <td>
                                    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-dark butt">
                                        حذف مطلب
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-dark butt">
                                        ویرایش مطلب
                                    </a>
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
    <div class="pagination justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
