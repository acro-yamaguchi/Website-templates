<template>
    <div class="login">
        <v-container fluid class="screen">
                <v-row justify='center'>
                    <v-card :width="$vuetify.breakpoint.mobile ? 300: 500" class="card">
                        <v-toolbar flat dark color="#b5e61d">
                            <v-toolbar-title>管理者ページ - ログイン</v-toolbar-title>
                        </v-toolbar>
                        <v-container fluid>
                            <v-row justify='center'>
                                <v-col cols='4' class="text-center">ユーザーID</v-col>
                                <v-col cols='6'>
                                    <v-text-field
                                    v-model="userId"
                                    outlined
                                    dense
                                    hide-details
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify='center'>
                                <v-col cols='4' class="text-center">Password</v-col>
                                <v-col cols='6'>
                                    <v-text-field
                                    v-model="pass"
                                    outlined
                                    dense
                                    type='password'
                                    hide-details
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn text color="#b5e61d" @click="submit">
                                    送信
                                </v-btn>
                            </v-card-actions>
                        </v-container>
                    </v-card>
                </v-row>
        </v-container>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            userId: '',
            pass: ''
        }
    },
    methods:{
        submit(){
            try{
                axios.post('./api/login.php', {
                  userId: this.userId,
                  pass: this.pass
                })
                .then((response) => {
                    switch(response.data.result) {
                        case 'false': window.location.href = './api/tVtGafxJsnVtL38ATGML.php'
                            break
                        case 'error': alert('DB接続エラー')
                            break
                        default: this.success(response.data.result)
                    }
                })
            }
            catch{
                alert('通信エラー')
            }
        },

        success(data){
            this.saveToken(data)
            this.redirect()
        },
        saveToken(data){
            let arrayData = data.split('?')
            this.$store.dispatch("auth", {
                id: arrayData[0],
                token: arrayData[1]
            })
        },
        redirect(){
            this.$router.push('/admin/editNews')
        }
    }
}
</script>

<style scoped>
.login {
    height: 100vh;
    width: 100vw;
}
.card {
    position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
</style>