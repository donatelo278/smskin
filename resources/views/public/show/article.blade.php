@extends('public.layouts')
@section('content')
        <div class="row">
            <div class="col-12">
                <hr />
                {{ $article->title }}<br />
                <img src="{{ asset('storage/images/default.png') }}" style="width: 100px; height: 100px;"/> <br />
                Описание: {{ $article->desc }}<br />
                Просмотры: <span id="viewCount">{{ $article->count_view }}</span><br />
                <label for="like" id="likeCount">{{ $article->count_like }}</label>
                <button type="button" class="btn btn-primary m-1" name="like" id="like" data-id="{{ $article->id }}">Лайк</button>
            </div>
        </div>
        <div id="commentMessage"></div>
        <div class="row">
            <div class="col-12" id="blockComment">
                <form action="{{ route('comment-store', $article->id) }}" method="post" class="form-control">
                    @csrf
                    <label for="subject">Тема</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                    <label for="subject">Текст</label>
                    <textarea rows="5" class="form-control" name="message" id="message"></textarea>
                    <button type="button" class="btn btn-primary mt-1" id="sendComment">Отправить</button>
                </form>
            </div>
        </div>
@push('script-shared')
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '#like', function () {
            var id = $('#like').attr('data-id');
                $.ajax({
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}, // для ларавел
                    type: "POST",
                    url: "{{ route('like-store') }}",
                    async: true,
                    cache: false,
                    data: {id : id},
                    dataType: "html",
                    success: function (result) {
                        var json = JSON.parse(result);
                        $('#likeCount').html(json.count_like);
                    }
                });
        });


        $('body').on('click', '#sendComment', function () {
            var id = $('#like').attr('data-id');
            var message = $('#message').val();
            var subject = $('#subject').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}, // для ларавел
                type: "POST",
                url: "{{ route('comment-store') }}",
                async: true,
                cache: false,
                data: {id : id, message : message, subject : subject},
                dataType: "html",
                success: function (result) {
                    console.log(result);
                    try
                    {
                        var json = JSON.parse(result);
                        if(json.status == 'ok')
                        {
                            $('#blockComment').html("<p class='alert alert-success'>Ваше сообщение успешно отправлено</p>");
                            return true;
                        }
                    }
                    catch (e)
                    {
                        $('#commentMessage').html(result);
                    }


                }
            });
        });
    });

    $(document).ready(function () {
        var timer;
        timer = setTimeout(function (e) {
            var id = $('#like').attr('data-id');
            $.ajax({
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}, // для ларавел
                type: "POST",
                url: "{{ route('view-store') }}",
                async: true,
                cache: false,
                data: {id : id},
                dataType: "html",
                success: function (result) {
                    var json = JSON.parse(result);
                    $('#viewCount').html(json.count_view);
                }
            });
        }, 5000);
    });

</script>
@endpush

@endsection
