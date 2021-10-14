<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/confirm.css">
</head>
<body>
  <main class="contact">
    <div>
      <h1 class="contact_ttl">内容確認</h1>
    </div>
    <div class="contact_form">
      <form action="/contact/send" method="POST">
        @csrf
        <div class="input-margin contact_name">
          <label class="contact_label" for="name">お名前</label>
          <p class="confirm-content" name="fullname">{{$form['fullname']}}</p>
        </div>
        <div class="input-margin contact_gender">
          <label class="contact_label" for="gender">性別</label>
          @if ($form['gender'] == 1)
          <p class="confirm-content">男性</p>
          @else
          <p class="confirm-content">女性</p>
          @endif
        </div>
        <div class="input-margin contact_email">
          <label class="contact_label" for="email">メールアドレス</label>
          <p class="confirm-content">{{$form['email']}}</p>
        </div>
        <div class="input-margin contact_postcode">
          <label class="contact_label" for="postcade">郵便番号</label>
          <p class="confirm-content">{{$form['postcode']}}</p>
        </div>
        <div class="input-margin contact_address">
          <label class="contact_label" for="address">住所</label>
          <p class="confirm-content">{{$form['address']}}</p>
        </div>
        <div class="input-margin contact_building_name">
          <label class="contact_label" for="building_name">建物名</label>
          <p class="confirm-content">{{$form['building_name']}}</p>
        </div>
        <div class="contact_opinion">
          <label class="contact_label" for="opinion">ご意見</label>
          <p class="confirm-content">{{$form['opinion']}}</p>
        </div>
        <input class="button" type="submit" value="送信">
        <input class="modify" type="submit" name="back" value="修正する">
      </form>
    </div>
  </main>
</body>
</html>