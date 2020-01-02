{{ $npo_user_info->npo }}
{{ $npo_user_info->name }}様

いつもお世話になっております。
株式会社Fsharp運営局です。

Fsharpにご登録されている{{ $npo_name }}に
新規のご支援がありましたので、ご連絡いたしました。

以下、詳細情報
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
支援者：{{ $auth_after->name }}様
支援先：{{ $npo_name }}
支援者URL：{{ url('/') }}/home/{{ $auth_after->name }}
支援先URL：{{ url()->previous() }}
メッセージ：{{ url()->previous() }}/chat/t/{{ $auth_after->name }}
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

＊このメールに対して、ご質問や身に覚えなのない方は、お手数ですがご返信ください。
