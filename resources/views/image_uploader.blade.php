@extends('layouts.app')

@section('content')

{!! Form::open(['url' => '/other/image_upload', 'method' => 'post', 'files' => true ]) !!}

{{--成功時のメッセージ--}}
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
<script type="text/javascript">
	window.close();
</script>
@endif
{{-- エラーメッセージ --}}
@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

<div class="form-group">
    {!! Form::label('file', '画像アップロード', ['class' => 'control-label']) !!}
    {!! Form::file('file') !!}
</div>

<div class="form-group">
    {!! Form::submit('アップロード', ['class' => 'btn btn-default']) !!}
</div>
{{ csrf_field() }}
{!! Form::close() !!}

    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')

       <!--<article>-->
      	<div class="center_column_top">
      	</div>
        <!--</article>-->

</div>
@endsection