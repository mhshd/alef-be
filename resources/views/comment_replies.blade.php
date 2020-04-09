<script>
    //this function checks to see if the input field is filled
    function validateForm() {
        var x = document.forms["commentForm"]["comment_body"].value;
        if (x == "") {
            alert("لطفا نظر حود را وارد کنید");
            return false;
        }
    }
</script>
@foreach($comments as $comment)

    <div class="display-comment">
{{--        htmlspecialchars is used to Data Escaping. it means we remove html tags from the input text--}}
        <p>{{ htmlspecialchars($comment->body) }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}"onsubmit="return validateForm()"  required>
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-dark butt" value="پاسخ" />
            </div>
        </form>
        @include('comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
