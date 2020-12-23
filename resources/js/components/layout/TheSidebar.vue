<template>
  <aside class="col-md-4 col-xs-12">
    <section class="sidebar-sns-section">
      <h3 class="text-center sidebar-sns-h3">SNS共有</h3>
      <div class="sidebar-sns-links">
        <social-sharing title="shareボタン" inline-template>
          <div class="twitter__share">
            <network network="twitter">
              <i class="fab fa-twitter"></i> Twitter
            </network>
          </div>
        </social-sharing>
        <social-sharing title="shareボタン" inline-template>
          <div class="facebook__share">
            <network network="facebook">
              <i class="fab fa-facebook"></i> Facebook
            </network>
          </div>
        </social-sharing>
        <social-sharing title="shareボタン" inline-template>
          <div class="line__share">
            <network network="line">
              <i class="fab fa-line"></i> Line
            </network>
          </div>
        </social-sharing>
        <social-sharing title="shareボタン" inline-template>
          <div class="google__share">
            <network network="googleplus">
              <i class="fab fa-google"></i> google
            </network>
          </div>
        </social-sharing>
      </div>
    </section>
    <section class="sidebar-keywords">
      <h3 class="text-center sidebar-keywords-h3">キーワード集</h3>
      <ul class="sidebar-keywords__links">
        <li>
          <router-link to="/keyword?initial=A">Ａ</router-link>
          <router-link to="/keyword?initial=B">Ｂ</router-link>
          <router-link to="/keyword?initial=C">Ｃ</router-link>
          <router-link to="/keyword?initial=D">Ｄ</router-link>
          <router-link to="/keyword?initial=E">Ｅ</router-link>
          <router-link to="/keyword?initial=F">Ｆ</router-link>
          <router-link to="/keyword?initial=G">Ｇ</router-link>
          <router-link to="/keyword?initial=H">Ｈ</router-link>
          <router-link to="/keyword?initial=I">Ｉ</router-link>
          <router-link to="/keyword?initial=J">Ｊ</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=K">Ｋ</router-link>
          <router-link to="/keyword?initial=L">Ｌ</router-link>
          <router-link to="/keyword?initial=M">Ｍ</router-link>
          <router-link to="/keyword?initial=N">Ｎ</router-link>
          <router-link to="/keyword?initial=O">Ｏ</router-link>
          <router-link to="/keyword?initial=P">Ｐ</router-link>
          <router-link to="/keyword?initial=Q">Ｑ</router-link>
          <router-link to="/keyword?initial=R">Ｒ</router-link>
          <router-link to="/keyword?initial=S">Ｓ</router-link>
          <router-link to="/keyword?initial=T">Ｔ</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=U">Ｕ</router-link>
          <router-link to="/keyword?initial=V">Ｖ</router-link>
          <router-link to="/keyword?initial=W">Ｗ</router-link>
          <router-link to="/keyword?initial=X">Ｘ</router-link>
          <router-link to="/keyword?initial=Y">Ｙ</router-link>
          <router-link to="/keyword?initial=Z">Ｚ</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=あ">あ</router-link>
          <router-link to="/keyword?initial=い">い</router-link>
          <router-link to="/keyword?initial=う">う</router-link>
          <router-link to="/keyword?initial=え">え</router-link>
          <router-link to="/keyword?initial=お">お</router-link>
          <router-link to="/keyword?initial=か">か</router-link>
          <router-link to="/keyword?initial=き">き</router-link>
          <router-link to="/keyword?initial=く">く</router-link>
          <router-link to="/keyword?initial=け">け</router-link>
          <router-link to="/keyword?initial=こ">こ</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=さ">さ</router-link>
          <router-link to="/keyword?initial=し">し</router-link>
          <router-link to="/keyword?initial=す">す</router-link>
          <router-link to="/keyword?initial=せ">せ</router-link>
          <router-link to="/keyword?initial=そ">そ</router-link>
          <router-link to="/keyword?initial=た">た</router-link>
          <router-link to="/keyword?initial=ち">ち</router-link>
          <router-link to="/keyword?initial=つ">つ</router-link>
          <router-link to="/keyword?initial=て">て</router-link>
          <router-link to="/keyword?initial=と">と</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=な">な</router-link>
          <router-link to="/keyword?initial=に">に</router-link>
          <router-link to="/keyword?initial=ぬ">ぬ</router-link>
          <router-link to="/keyword?initial=ね">ね</router-link>
          <router-link to="/keyword?initial=の">の</router-link>
          <router-link to="/keyword?initial=は">は</router-link>
          <router-link to="/keyword?initial=ひ">ひ</router-link>
          <router-link to="/keyword?initial=ふ">ふ</router-link>
          <router-link to="/keyword?initial=へ">へ</router-link>
          <router-link to="/keyword?initial=ほ">ほ</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=ま">ま</router-link>
          <router-link to="/keyword?initial=み">み</router-link>
          <router-link to="/keyword?initial=む">む</router-link>
          <router-link to="/keyword?initial=め">め</router-link>
          <router-link to="/keyword?initial=も">も</router-link>
          <router-link to="/keyword?initial=ら">ら</router-link>
          <router-link to="/keyword?initial=り">り</router-link>
          <router-link to="/keyword?initial=る">る</router-link>
          <router-link to="/keyword?initial=れ">れ</router-link>
          <router-link to="/keyword?initial=ろ">ろ</router-link>
        </li>
        <li>
          <router-link to="/keyword?initial=や">や</router-link>
          <router-link to="/keyword?initial=ゆ">ゆ</router-link>
          <router-link to="/keyword?initial=よ">よ</router-link>
          <router-link to="/keyword?initial=わ">わ</router-link>
          <router-link to="/keyword?initial=を">を</router-link>
        </li>
      </ul>
    </section>
  </aside>
</template>

