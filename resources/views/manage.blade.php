<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/manage.css">
</head>
<body>
  <h1 class="contact_ttl">管理システム</h1>
  <div class="manage_container">
    <form action="/contact/manage" method="GET">
      @csrf
      <div class="flex-container">
          <label class="label" for="getname">お名前</label>
          <input  class="input" type="text" name="getname" value="{{ $getname }}">
          <label class="gender-label" for="getgender">性別</label>
          <div class="flex-gender">
            <input class="gender-radio" type="radio" value="" name="getgender" checked><span class="gender-txt">全て</span>
            <input class="gender-radio" type="radio" value="1" name="getgender"><span class="gender-txt">男性</span>
            <input class="gender-radio" type="radio" value="2" name="getgender"><span class="gender-txt">女性</span>
          </div>
      </div>
      <div class="flex-date">
        <label class="label" for="created_at">登録日</label>
        <div class="flex-container">
          <input class="input" type="date" name="from" value="{{ $from }}">
          <span class="date-span">~</span>
          <input class="input" type="date" name="until" value="{{ $until }}">
        </div>
      </div>
      <div class="flex-container">
        <label class="label" for="getemail">メールアドレス</label>
        <input class="input" type="getemail" name="getemail" value="{{ $getemail }}">
      </div>
      <input class="button" type="submit" value="検索">
      <input class="reset" type="submit" value="リセット" name="reset">
    </form>
  </div>
  <div class="pagination-view">
    @if (count($items) >0)
    <p>全{{ $items->total() }}件中 
      {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
      {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</p>
      @endif 
      {{$items->links('vendor.pagination.default')}}
  </div>
    <table>
    <tr class="th-list">
      <th class="th-id">ID</th>
      <th class="th-name">お名前</th>
      <th class="th-gender">性別</th>
      <th class="th-email">メールアドレス</th>
      <th class="th-opinion">ご意見</th>
      <th class="th-delete"></th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td class="td">{{ $item->id }}</td>
      <td class="td">{{ $item->fullname }}</td>
      @if ($item['gender'] == 1)
      <td class="td">男性</td>
      @else
      <td class="td">女性</td>
      @endif
      <td class="td">{{ $item->email }}</td>
      <td class="opinion">{{ $item->opinion }}</td>
      <td class="content"></td>
      <td>
        <form action="{{ route('contact.destroy', ['id' => $item->id]) }}" method="POST">
          @csrf
          <input class="delete" type="submit" value="削除">
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  <script src="{{ asset('js/mouseover.js') }}"></script>
</body>
</html>