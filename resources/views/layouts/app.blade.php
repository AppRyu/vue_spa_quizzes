<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- postする際に必要な値 --}}
    <meta name="api-token" content="{{ session()->get('api_token') ?? '' }}">
    <title>4 Answers Quiz 4択クイズ&クイズ徹底解説</title>
  </head>
  <body>
    <body>
      <div id="app">
        <app :errors="{{ $errors }}" :auth="{{ Auth::user() ?? '[]' }}" />
      </div>
      <script src="/js/app.js"></script>
  </body>
</html>
