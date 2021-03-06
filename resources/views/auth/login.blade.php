@extends('layouts.app')
@section('title','ログイン')

@section('content')
<div class="main users-new">
   <div class="container">
      <div class="heading">ログイン</div>
      <form method="POST" action="{{ route('login') }}" class="form users-form">
         @csrf

         <div class="form-body">
            <p>メールアドレス</p>
            @error('email')
            <div class="form-error" role="alert">
               {{ $message }}
            </div>
            @enderror
            <input type="email" name="email" value="{{ old('email') }}"
               class="@error('password')is-invalid @enderror" autocomplete="email"
               autofocus>

            <p>パスワード</p>
            @error('password')
            <div id="password" class="form-error" role="alert">
               {{ $message }}
            </div>
            @enderror
            <input type="password" name="password" class="@error('password')is-invalid @enderror"
               autocomplete="current-password">

            {{-- remember me --}}
            <div class="form-check">
               <label class="form-check-label" for="remember">ログインを保持する</label>
               <input class="form-check-input w-auto ml-1"
                  type="checkbox" name="remember" id="remember"
                  {{ old('remember') ? 'checked' : '' }}>
            </div>

            <input type="submit" value="ログイン">
         </div>
      </form>
      <form action="{{route('login')}}" method="post"
         style="text-align:right;">
         @csrf
         <input type="hidden" name="email" value="guest@example.com">
         <input type="hidden" name="password" value="password">
         <button type="submit"
            style="margin-top:10px; border:none; color: white;padding:5px 10px; border-radius:5px; background-color: #3490dc;">新規登録せずに、機能を試したい方はこちら</button>
      </form>
   </div>
</div>
@endsection
