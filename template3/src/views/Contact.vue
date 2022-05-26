<template>
  <div class="contact">
    <v-container fluid>
      <v-row justify="center" class="mt-5">
        <v-col cols="12" class="text-h5 text-center" id="form_top">【お問い合わせフォーム】</v-col>
        <v-col cols="12" md="8" class="mb-6">
          <v-alert
            :type='alert_type'
            dismissible
            v-model="alert"
            dense
          >
          {{ alert_message }}
          </v-alert>
          <v-form ref="form">
            <v-row>
              <v-col cols="5" class="text-body-1 text-center cell_top remove_border-right">
                お名前<br>
                <span style="color: red; font-size: 16px;">※必須</span>
              </v-col>
              <v-col cols="7" class="cell_top">
                <v-text-field
                  v-model="name"
                  :rules="nameRules"
                  required
                  outlined
                  dense
                ></v-text-field>
              </v-col>
              <v-col cols="5" class="text-body-1 text-center cell remove_border-right">
                E-mail<br>
                <span style="color: red; font-size: 16px;">※必須</span>
              </v-col>
              <v-col cols="7" class="cell">
                <v-text-field
                  v-model="email"
                  :rules="emailRules"
                  required
                  outlined
                  dense
                  type="email"
                ></v-text-field>
              </v-col>
              <v-col cols="5" class="text-body-1 text-center cell remove_border-right">
                お電話番号<br>
                <span style="color: red; font-size: 16px;">※必須(ハイフンなし、半角数字)</span>
              </v-col>
              <v-col cols="7" class="cell">
                <v-text-field
                  v-model="phone"
                  :rules="phoneRules"
                  required
                  outlined
                  dense
                  type="tel"
                ></v-text-field>
              </v-col>
              <v-col cols="5" class="text-body-1 text-center cell remove_border-right">
                カテゴリ<br>
                <span style="color: red; font-size: 16px;">※必須</span>
              </v-col>
              <v-col cols="7" class="cell">
                <v-select
                  outlined
                  v-model="category"
                  :items="items"
                  :rules="categoryRules"
                  dense
                  required
                ></v-select>
              </v-col>
              <v-col cols="5" class="text-body-1 text-center cell remove_border-right">
                件名
              </v-col>
              <v-col cols="7" class="cell">
                <v-text-field
                  v-model="title"
                  outlined
                  dense
                ></v-text-field>
              </v-col>
              <v-col cols="5" class="text-body-1 text-center cell remove_border-right">
                お問い合わせ内容<br>
                <span style="color: red; font-size: 16px;">※必須</span>
              </v-col>
              <v-col cols="7" class="cell">
                <v-textarea
                  v-model="content"
                  :counter="500"
                  :rules="contentRules"
                  required
                  outlined
                  auto-grow
                ></v-textarea>
              </v-col>
            </v-row>
            <v-row justify="center" class="mt-6">
              <v-btn
                color="success"
                large
                @click="submit"
                :loading="loading"
              >送信</v-btn>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import axios from "axios"
export default {
  data() {
    return {
      name: '',
      email: '',
      phone: null,
      category: '',
      items: ['お仕事', '求人', 'その他'],
      title: '',
      content: '',
      nameRules: [
        v => !!v || 'お名前の入力は必須です',
      ],
      emailRules: [
        v => !!v || 'メールアドレスの入力は必須です',
        v => /.+@.+\..+/.test(v) || '無効メールアドレスです',
      ],
      phoneRules: [
        v => !!v || 'お電話番号の入力は必須です',
        v => /^[0-9]+$/.test(v) || 'お電話番号は半角数字のみで入力して下さい'
      ],
      categoryRules: [
        v => !!v || 'カテゴリの選択は必須です',
      ],
      contentRules: [
        v => !!v || 'お問い合わせ内容の入力は必須です',
        v => v.length <= 500 || 'お問い合わせ内容は500文字までです。',
      ],
      loading: false, //「送信」ボタンのローディング制御
      //↓アラート関連
      alert: false,
      alert_type: 'success',
      alert_message: '',
    }
  },
  methods: {
    submit() {
      //全てのバリデーションに通過したとき
      if(this.$refs.form.validate()){
          this.loading = true
          try{
            //テーブルの内容をバックエンドに送信
            axios.post('./api/contact.php', {
              name: this.name,
              email: this.email,
              phone: this.phone,
              category: this.category,
              title: this.title,
              content: this.content
            })
            .then((response) => {
              if(response.data.result){
                console.log('メール送信: 成功')
                this.alert_type = 'success'
                this.alert_message = '送信が完了しました!'
                this.alert = true
                this.save_to_db()
                this.$refs.form.reset()
              } else {
                console.log('メール送信: 失敗')
                this.alert_type = 'error'
                this.alert_message = 'メールの送信に失敗しました'
                this.alert = true  
              }
                this.$vuetify.goTo('#form_top')
                this.loading = false
            })
          }
          catch{
            console.log('DB送信: 接続エラー')
            this.loading = false
            this.alert_type = 'error'
            this.alert_message = '通信エラーが発生しました'
            this.alert = true
            this.$vuetify.goTo('#form_top')

          }
      //バリデーションに通過しないとき
      } else {
          this.alert_type = 'warning'
          this.alert_message = '入力が正しくありません'
          this.alert = true
          this.$vuetify.goTo('#form_top')

      }
    },
    save_to_db() {
      try{
        //テーブルの内容をバックエンドに送信
        axios.post('./api/saveMail.php', {
          name: this.name,
          email: this.email,
          phone: this.phone,
          category: this.category,
          title: this.title,
          content: this.content
        })
        .then((response) => {
          if(response.data.result) {
            console.log('DB送信: 成功')
          } else {
            console.log('DB送信: 失敗')
          }
        })
      }
      catch{
        console.log('DB送信: 接続エラー')
      }
    },
  },
}
</script>

<style scoped>
.cell {
  border: solid;
  border-top: none;
}

.cell_top {
  border: solid;
}

.remove_border-right {
  border-right: none;
}
</style>