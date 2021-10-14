<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  @livewireStyles
</head>
<body> 
  @if (count($errors) > 0)
    <p>入力に問題があります</p>
  @endif
  <main class="contact">
    <div>
      <h1 class="contact_ttl" id="test">お問い合わせ</h1>
    </div>
    <div class="contact_form">
      <livewire:counter>
    </div>
  </main>
  @livewireScripts
  <script src="{{ asset('js/validate.js') }}"></script>
</body>
</html>