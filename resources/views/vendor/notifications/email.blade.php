@component('mail::message')

{{-- Greeting --}}
@if (! empty($greeting))
    # {{ $greeting }}
@else
    @if ($level === 'error')
        # @lang('Whoops!')
    @else
        <b>こんにちは</b>
        # @lang('Hello!')
    @endif
@endif

下の青いボタンをクリックして、メール認証してください。
{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset
このメールに心当たりがない場合、大変お手数ですがその旨をこのメールに、ご返信いただければ幸いです。
{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{--@lang('Regards'),<br>--}}
{{ config('app.name') }} 管理者（仲条高幸）
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    ":actionText ボタンが利用できない場合は、以下のURLをコピー＆ペーストしてブラウザから直接アクセスしてください。<br />\n" .
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
