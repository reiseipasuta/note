
<p>グループへ招待されました</p>
<p>トークン：{{$token->token}}</p>
{{-- <p>招待URL：http://localhost:8081/join/{{ $token->group_id }}/{{ $token->token }}</p> --}}

<p>招待URL：{{ route('joinGroup', ['token' => $token->token, 'group' => $token->group_id] ) }}</p>
