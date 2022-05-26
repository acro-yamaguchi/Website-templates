<template>
    <v-expansion-panels v-model="panel">
        <v-expansion-panel>
            <v-expansion-panel-header color="#b5e61d">
                お知らせ追加
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-container class="mt-5">
                    <v-row justify='center'>
                        <v-col cols="12">
                            <v-form ref="form">
                                <v-row justify="center">
                                    <v-col cols="3" class="text-body-2 text-center cell_top remove_border-right">
                                        見出し<br>
                                        <span style="color: red; font-size: 12px;">※必須</span>
                                    </v-col>
                                    <v-col cols="7" class="cell_top">
                                        <v-text-field
                                        outlined
                                        dense
                                        v-model="title"
                                        :rules="Rules"
                                        required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3" class="text-body-2 text-center cell remove_border-right">
                                        概要<br>
                                        <span style="color: red; font-size: 12px;">※必須</span>
                                    </v-col>
                                    <v-col cols="7" class="cell">
                                        <v-text-field
                                        outlined
                                        dense
                                        v-model="summary"
                                        :rules="Rules"
                                        required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3" class="text-body-2 text-center cell remove_border-right">
                                        内容<br>
                                        <span style="color: red; font-size: 12px;">※必須</span>
                                    </v-col>
                                    <v-col cols="7" class="cell">
                                        <v-textarea
                                        outlined
                                        auto-grow
                                        v-model="content"
                                        :rules="Rules"
                                        required
                                        ></v-textarea>
                                    </v-col>
                                    <v-col cols="3" class="text-body-2 text-center cell remove_border-right">
                                        画像<br>
                                        <span style="color: red; font-size: 12px;">※必須</span>
                                    </v-col>
                                    <v-col cols="7" class="cell">
                                        <image-input v-model="image"/>
                                    </v-col>
                                    <v-col cols="3" class="text-body-2 text-center cell remove_border-right">
                                        プレビュー<br>
                                    </v-col>
                                    <v-col cols="7" class="cell">
                                        <img :src="image.src == null ? require('@/assets/news.png') : image.src">
                                    </v-col>
                                </v-row>
                                <v-row justify="end" class="mt-6">
                                    <v-btn
                                        color="success"
                                        large
                                        @click="submit"
                                        :loading="loading"
                                    >登録</v-btn>
                                </v-row>
                            </v-form>
                        </v-col>
                    </v-row>
                </v-container>
            </v-expansion-panel-content>
        </v-expansion-panel>
        <transition name="fade">
            <successMessage v-if="success"></successMessage>
        </transition>
    </v-expansion-panels>
</template>

<script>
import ImageInput from "../components/ImageInput.vue"
import successMessage from '../components/StoreSuccessMessage.vue'
import axios from 'axios'

export default {
    components: {
        ImageInput,
        successMessage
    },
    data() {
        return {
            title: '',
            summary: '',
            content: '',
            image: {},
            Rules: [
                v => !!v || '入力必須です',
            ],
            loading: false,
            success: false,
            panel: true
        }
    },
    methods: {
        submit(){
            if(this.$refs.form.validate()){
                this.loading = true
                if(this.image.src == null){
                    this.storeNews(null, null)
                } else {
                    const img = this.image.src.replace(/^data:\w+\/\w+;base64,/, '')
                    const fileExtension = this.image.src.toString().slice(this.image.src.indexOf('/') + 1, this.image.src.indexOf(';'))
                    const date = new Date()
                    const fileName = date.valueOf()
                    const name = '' + fileName + '.' + fileExtension
    
                    this.storeNews(img, name)
                }
            }
        },
        storeImage(img, name){
            let data = {
                name: name,
                image: img
            }
            axios.post('./api/storeImage.php', data).then(() => {
                this.displayMessage()
                this.loading = false
            })
        },
        storeNews(img, name){
            let data = {}
            if(img == null){
                data = {
                    title: this.title,
                    summary: this.summary,
                    content: this.content,
                    image: null
                }
            } else {
                const imageUrl = '../storage/' + name
                data = {
                    title: this.title,
                    summary: this.summary,
                    content: this.content,
                    image: imageUrl
                }
            }
            axios.post('./api/storeNews.php', data).then((response) => {
                if(img != null){
                    if(response.data) {
                        this.storeImage(img, name)
                    } else {
                        alert('DB接続エラー')
                        this.loading = false
                    }               
                } else {
                    this.displayMessage()
                    this.loading = false
                }
            })
        },
        displayMessage(){
            this.panel = false
            this.success = true
            setTimeout(this.hideMessage, 2000)
        },
        hideMessage(){
            this.success = false
            location.reload()
        }
    },
    created() {
        this.success = false
    }
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

img{
    width: 100%;
    height: 100%;
  object-fit: contain;
}

.fade-enter-active {
  transition: opacity 2s;
  opacity: 0;
}

.fade-enter-to {
  opacity: 1;
}

.fade-leave-active{
    transition: opacity 2s;
    opacity: 1;
}

.fade-leave-to {
    opacity: 0;
}

</style>