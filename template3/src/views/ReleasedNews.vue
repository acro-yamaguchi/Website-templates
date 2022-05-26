<template>
    <div class="releasedNews pa-3">
        <transition name="message">
            <successMessage v-if="success"></successMessage>
        </transition>
        <v-container>
            <v-row justify="center">
                <v-card max-width="800px">
                    <v-toolbar color="#b5e61d">おしらせ公開</v-toolbar>

                    <v-card-text>
                        <v-row justify="center" class="ma-0">
                            <v-col cols="3" class="cell_top remove_border-right  d-flex justify-center align-center">1番目</v-col>
                            <v-col cols="6" class="cell_top remove_border-right d-flex">
                                <v-text-field
                                    outlined
                                    dense
                                    hide-details
                                    v-model="order1"
                                ></v-text-field>
                                <v-btn icon class="ml-1" @click="clear(1, order1)">
                                    <v-icon>mdi-close-circle-outline</v-icon>
                                </v-btn>
                            </v-col>
                            <v-col cols="3" class="cell_top d-flex justify-center align-center">
                                <v-btn ref="btn1" small height="40" color="success" @click="submit(1, order1)">登録</v-btn>
                            </v-col>
                        </v-row>
                        <v-row justify="center" class="ma-0">
                            <v-col cols="3" class="cell remove_border-right  d-flex justify-center align-center">2番目</v-col>
                            <v-col cols="6" class="cell remove_border-right d-flex">
                                <v-text-field
                                    outlined
                                    dense
                                    hide-details
                                    v-model="order2"
                                ></v-text-field>
                                <v-btn icon class="ml-1" @click="clear(2, order2)">
                                    <v-icon>mdi-close-circle-outline</v-icon>
                                </v-btn>
                            </v-col>
                            <v-col cols="3" class="cell d-flex justify-center align-center">
                                <v-btn ref="btn2" small height="40" color="success" @click="submit(2, order2)">登録</v-btn>
                            </v-col>
                        </v-row>
                        <v-row justify="center" class="ma-0">
                            <v-col cols="3" class="cell remove_border-right  d-flex justify-center align-center">3番目</v-col>
                            <v-col cols="6" class="cell remove_border-right d-flex">
                                <v-text-field
                                    outlined
                                    dense
                                    hide-details
                                    v-model="order3"
                                ></v-text-field>
                                <v-btn icon class="ml-1" @click="clear(3, order3)">
                                    <v-icon>mdi-close-circle-outline</v-icon>
                                </v-btn>
                            </v-col>
                            <v-col cols="3" class="cell d-flex justify-center align-center">
                                <v-btn ref="btn3" small height="40" color="success" @click="submit(3, order3)">登録</v-btn>
                            </v-col>
                        </v-row>
                        <v-row justify="center" class="ma-0">
                            <v-col cols="3" class="cell remove_border-right  d-flex justify-center align-center">4番目</v-col>
                            <v-col cols="6" class="cell remove_border-right d-flex">
                                <v-text-field
                                    outlined
                                    dense
                                    hide-details
                                    v-model="order4"
                                ></v-text-field>
                                <v-btn icon class="ml-1" @click="clear(4, order4)">
                                    <v-icon>mdi-close-circle-outline</v-icon>
                                </v-btn>
                            </v-col>
                            <v-col cols="3" class="cell d-flex justify-center align-center">
                                <v-btn ref="btn4" small height="40" color="success" @click="submit(4, order4)">登録</v-btn>
                            </v-col>
                        </v-row>
                        <v-row justify="center" class="ma-0">
                            <v-col cols="3" class="cell remove_border-right  d-flex justify-center align-center">5番目</v-col>
                            <v-col cols="6" class="cell remove_border-right d-flex">
                                <v-text-field
                                    outlined
                                    dense
                                    hide-details
                                    v-model="order5"
                                ></v-text-field>
                                <v-btn icon class="ml-1" @click="clear(5, order5)">
                                    <v-icon>mdi-close-circle-outline</v-icon>
                                </v-btn>
                            </v-col>
                            <v-col cols="3" class="cell d-flex justify-center align-center">
                                <v-btn ref="btn5" small height="40" color="success" @click="submit(5, order5)">登録</v-btn>
                            </v-col>
                        </v-row>
                        <v-row justify="center">
                            <v-col cols="2"></v-col>
                            <v-col cols="8">
                                <v-btn block color="success" @click="submitAll">
                                    まとめて登録
                                </v-btn>
                            </v-col>
                            <v-col cols="2"></v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios'
import successMessage from '../components/StoreSuccessMessage.vue'

export default {
    components: {
        successMessage
    },
    data() {
        return {
            news: [],
            newsInfo: {
                1: null,
                2: null,
                3: null,
                4: null,
                5: null
            },
            order1: '',
            order2: '',
            order3: '',
            order4: '',
            order5: '',
            success: false
        }
    },
    created() {
        axios.get('./api/getNews.php').then((response) => {
            this.news = response.data
            for(let i = 0; i < this.news.length; i++){
                this.newsInfo[this.news[i].publish_order] = this.news[i].id
            }
            if(this.newsInfo[1] != null){
                this.order1 = this.newsInfo[1].toString()
            }
            if(this.newsInfo[2] != null){
                this.order2 = this.newsInfo[2].toString()
            }
            if(this.newsInfo[3] != null){
                this.order3 = this.newsInfo[3].toString()
            }
            if(this.newsInfo[4] != null){
                this.order4 = this.newsInfo[4].toString()
            }
            if(this.newsInfo[5] != null){
                this.order5 = this.newsInfo[5].toString()
            }
            this.success = false
        })
    },
    methods: {
        submit(order, id){
            let data = {order: order, id: id}
            axios.post('./api/setOrder.php', data).then(()=>{
                this.displayMessage()
            })
            switch(order){
                    case 1: this.newsInfo[1] = id.toString()
                        break
                    case 2: this.newsInfo[2] = id.toString()
                        break
                    case 3: this.newsInfo[3] = id.toString()
                        break
                    case 4: this.newsInfo[4] = id.toString()
                        break
                    case 5: this.newsInfo[5] = id.toString()
                        break
                }
        },
        submitAll() {
            this.$refs.btn1.$el.click()
            this.$refs.btn2.$el.click()
            this.$refs.btn3.$el.click()
            this.$refs.btn4.$el.click()
            this.$refs.btn5.$el.click()
        },
        clear(order, id){
            let array = Object.entries(this.newsInfo).map(([key, value]) => ({'key': key, 'value': value}))
            if(array.filter(item => item.value === null).length === 4) {
                alert('公開数を0にはできません')
            } else {
                this.newsInfo[order] = null
                switch(order){
                    case 1: this.order1 = ''
                        break
                    case 2: this.order2 = ''
                        break
                    case 3: this.order3 = ''
                        break
                    case 4: this.order4 = ''
                        break
                    case 5: this.order5 = ''
                        break
                }
                let data = {id: id}
                axios.post('./api/clearOrder.php', data)
            }
        },
        displayMessage(){
            this.success = true
            setTimeout(this.hideMessage, 2500)
        },
        hideMessage(){
            this.success = false
        }
    }
}
</script>

<style scoped>
.cell {
  border: solid;
  border-top: none;
  border-color: rgba(0, 0, 0, 0.8);
}

.cell_top {
  border: solid;
  border-color: rgba(0, 0, 0, 0.8);
}

.remove_border-right {
  border-right: none;
}

.fade-enter-active {
  transition: opacity 2s;
  opacity: 0;
}

.fade-enter-to {
  opacity: 1;
}

.message-enter-active {
  transition: opacity 2s;
  opacity: 0;
}

.message-enter-to {
  opacity: 1;
}

.message-leave-active{
    transition: opacity 2s;
    opacity: 1;
}

.message-leave-to {
    opacity: 0;
}
</style>