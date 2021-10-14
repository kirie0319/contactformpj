<div id="app">
    <form action="/contact/create" method="POST">
        @csrf
        <div class="input-margin contact_name">
          @if ($errors->has('fullname'))
          <tr>
            <th>ERROR</th>
            <td>
                {{$errors->first('fullname')}}
            </td>
          </tr>
          @endif
          <label class="label contact_label" id="input" for="name">お名前</label>
          <div class="input-container input-container_flex">
            <div class="contact_name-input">
              <input class="input" name="fullname"  type="text" value="{{ old('fullname') }}" maxlength="255" required>
              <p class="example">例）山田</p>
            </div>
            <div class="contact_name-input">
              <input class="input right" type="text">
              <p class="example">例）太郎</p>
            </div>
          </div>
        </div>
        <div class="input-margin contact_gender">
          <label class="label contact_label" for="gender">性別</label>
          <div class="input-container gender-container input-container_flex">
            <input class="input contact_gender-input" name="gender" value="1" {{ old('gender',1) == 1 ? 'checked' : '' }} type="radio">男性
            <input class="input contact_gender-input" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }} type="radio">女性
          </div>
        </div>
        <div class="input-margin contact_email">
          @if ($errors->has('email'))
          <tr>
            <th>ERROR</th>
            <td>
                {{$errors->first('email')}}
            </td>
          </tr>
          @endif
          <label class="label contact_label" for="email">メールアドレス</label>
          <div class="input-container">
            <input class="input contact_email-input" name="email" type="email" value="{{ old('email') }}" maxlength="255" required>
            <p class="example">例）test@example.com</p>
          </div>
        </div>
        <div class="input-margin contact_postcode">
          @if ($errors->has('postcode'))
          <tr>
            <th>ERROR</th>
            <td>
                {{$errors->first('postcode')}}
            </td>
          </tr>
          @endif
          <label class="label contact_label" for="postcade">郵便番号</label>
          <div class="input-container input-container_flex">
            <span class="postcode-sign">〒</span>
            <div class="contact_postcode-input">
              <input id="form" class="input" name="postcode" type="text" value="{{ old('postcode') }}" minlength="8" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" pattern="\d{3}-?\d{4}" required>
              <p class="example">例）123-4567</p>
            </div>
          </div>
        </div>
        <div class="input-margin contact_address">
          @if ($errors->has('address'))
          <tr>
            <th>ERROR</th>
            <td>
                {{$errors->first('address')}}
            </td>
          </tr>
          @endif
          <label class="label contact_label" for="address">住所</label>
          <div class="input-container">
            <input class="input contact_address-input" name="address" type="text" value="{{ old('address') }}" maxlength="255" required>
            <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
        </div>
        <div class="input-margin contact_building_name">
          <label class="contact_label" for="building_name">建物名</label>
          <div class="input-container">
            <input class="input contact_building_name-input" name="building_name" type="text" value="{{ old('building_name') }}">
            <p class="example">例）千駄ヶ谷マンション101</p>
          </div>
        </div>
        <div class="contact_opinion">
          @if ($errors->has('opinion'))
          <tr>
            <th>ERROR</th>
            <td>
                {{$errors->first('opinion')}}
            </td>
          </tr>
          @endif
          <label class="label contact_label" for="opinion">ご意見</label>
          <div class="input-container">
            <textarea name="opinion" id="" class="opinion-textarea" cols="30" rows="6" maxlength="120" required>{{ old('opinion') }}</textarea>
          </div>
        </div>
        <input class="button" type="submit" value="追加">
      </form>
</div>
