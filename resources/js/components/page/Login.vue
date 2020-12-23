<template>
  <div>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading text-center">ログイン</div>

              <div class="form-group has-error" v-if="errors.length !== 0">
                <div class="alert alert-danger text-center">
                  ログイン時にエラーが発生しました
                  <div v-for="(error, key, index) in errors" :key="index">{{error}}</div>
                </div>
              </div>

              <div class="panel-body">
                <ValidationObserver
                  class="form-horizontal"
                  ref="observer"
                  action="/login"
                  id="login"
                  method="post"
                  tag="form"
                  v-slot="{ invalid }"
                >
                  <input type="hidden" name="_token" :value="csrf" />

                  <div class="form-group">
                    <label for="email" class="col-md-4 control-label">メールアドレス</label>
                    <div class="col-md-6">
                      <validation-provider
                        name="メールアドレス"
                        rules="required|email"
                        v-slot="{ errors }"
                      >
                        <input v-model="email" name="email" type="email" class="form-control" />
                        <div class="alert alert-danger" v-show="errors[0]">{{ errors[0] }}</div>
                      </validation-provider>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="col-md-4 control-label">パスワード</label>
                    <div class="col-md-6">
                      <validation-provider name="パスワード" rules="required" v-slot="{ errors }">
                        <input
                          v-model="password"
                          name="password"
                          type="password"
                          class="form-control"
                        />
                        <div class="alert alert-danger" v-show="errors[0]">{{ errors[0] }}</div>
                      </validation-provider>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="remember" /> ログインを継続する
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">ログイン</button>

                      <a class="btn btn-link" href>パスワードをお忘れですか?</a>
                    </div>
                  </div>
                </ValidationObserver>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import { ValidationProvider, ValidationObserver, extend } from "vee-validate";
import { required, email } from "vee-validate/dist/rules";
extend("required", {
  ...required,
  message: "{_field_}は必須です"
});
extend("email", {
  ...email,
  message: "{_field_}はメールアドレス形式で入力してください"
});
export default {
  components: {
    ValidationProvider,
    ValidationObserver
  },
  data() {
    return {
      email: "",
      password: "",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  props: {
    errors: {
      type: Array | Object
    }
  },
  methods: {
    async login() {
      const isValid = await this.$refs.observer.validate();
      if (isValid) {
        document.querySelector("#login").submit();
      }
    }
  }
};
</script>
