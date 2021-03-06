<!--//this page provides comments under the posts and make a route to comment_replies view to see replies-->

<script>
    function validateForm() {
        var x = document.forms["commentForm"]["comment_body"].value;
        if (x == "") {
            alert("لطفا نظر حود را وارد کنید");
            return false;
        }
    }
</script>
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
                    <div class="card-body" style="direction: rtl; text-align: right">
                        <p><b>{{ $post->title }}</b></p>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr />
                        <h4>نظرات</h4>
                        @include('comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                        <hr />
                        <h4>افزودن نظر</h4>
                        <form name="commentForm" method="post" action="{{ route('comment.add') }}" onsubmit="return validateForm()"  required">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment_body" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark butt" value="افزودن نظر" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
