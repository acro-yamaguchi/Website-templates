<template>
  <div class="about">
    <v-main>
      <v-row justify="center">
        <v-col cols="12" class="text-center text-h5 mt-3">お知らせの編集</v-col>
      </v-row>
      <v-container class="mt-5 pa-0">
                      <v-row justify='center'>
                        <v-data-table
                          :headers='headers'
                          :items='news'
                          hide-default-footer
                          :items-per-page='-1'
                          style="border: thin solid rgba(0, 0, 0, .12);"
                          >
                              <template v-slot:[`item.actions`]="{ item }">
                                  <v-btn color='primary' @click.stop="editItem(item)">編集</v-btn>
                              </template>
                              <template v-slot:[`item.is_published`]="{ item }">
                                  <v-simple-checkbox
                                  v-model="item.is_published"
                                  disabled
                                  ></v-simple-checkbox>
                              </template>
                          </v-data-table>
                      </v-row>
                  </v-container>
                  <v-dialog v-model="dialog" max-width="960">
                      <v-card>
                          <v-toolbar
                              dark
                              color="grey darken-4"
                          >
                              <v-btn icon dark @click.stop="dialog = false">
                                  <v-icon>mdi-close</v-icon>
                              </v-btn>
                              <v-toolbar-title>{{dialog_title}}</v-toolbar-title>                        
                          </v-toolbar>
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
                                                  v-model="editedItem.title"
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
                                                  v-model="editedItem.summary"
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
                                                  v-model="editedItem.content"
                                                  :rules="Rules"
                                                  required
                                                  ></v-textarea>
                                              </v-col>
                                              
                                              <v-col cols="3" class="text-body-2 text-center cell remove_border-right">
                                                  削除
                                              </v-col>
                                              <v-col cols="7" class="cell">
                                                  <v-btn dark block color='error' @click.stop="remove_dialog = true">
                                                      記事の削除
                                                  </v-btn>
                                              </v-col>
                                          </v-row>
                                          <v-row justify="end" class="mt-6">
                                              <v-btn
                                                  color="success"
                                                  large
                                                  @click="submit"
                                                  :loading="loading"
                                              >保存</v-btn>
                                          </v-row>
                                      </v-form>
                                  </v-col>
                              </v-row>
                          </v-container>
                      </v-card>
                  </v-dialog>
                  <v-dialog width="300" v-model="remove_dialog">
                      <v-card>
                          <v-card-title class="text-center">本当に削除しますか？</v-card-title>
                          <v-card-actions>
                              <v-spacer></v-spacer>
                              <v-btn text color="#b5e61d" @click.stop="remove_dialog = false">
                                  CANCEL
                              </v-btn>
                              <v-btn text color="#D33" @click.stop="remove">
                                  OK
                              </v-btn>
                          </v-card-actions>
                      </v-card>
                  </v-dialog>
    </v-main>
  </div>
</template>

<script>
export default {
    data() {
        return {
            news: [
                {
                    id: 1,
                    content: 'Content',
                    is_published: true,
                    title: 'Title 1',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sit amet sint velit tempora!',
                },
                {
                    id: 2,
                    content: 'Content',
                    is_published: true,
                    title: 'Title 2',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
                {
                    id: 3,
                    content: 'Content',
                    is_published: true,
                    title: 'Title 3',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sit amet sint velit tempora!',
                },
                {
                    id: 4,
                    content: 'Content',
                    is_published: true,
                    title: 'Title 4',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
                {
                    id: 5,
                    content: 'Content',
                    is_published: false,
                    title: 'Title 5',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
                {
                    id: 6,
                    content: 'Content',
                    is_published: false,
                    title: 'Title 6',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
                {
                    id: 7,
                    content: 'Content',
                    is_published: false,
                    title: 'Title 7',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
                {
                    id: 8,
                    content: 'Content',
                    is_published: false,
                    title: 'Title 8',
                    time: '2022/05/01',
                    summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
            ],
            headers: [
                {
                    text: 'ID',
                    sortable: true,
                    value: 'id',
                    width: '15%',
                    divider: true
                },
                { text: '見出し', sortable: false, value: 'title', width: '30%', divider: true },
                { text: '概要', sortable: false, value: 'summary', width: '30%', divider: true },
                { text: '公開中', sortable: true, value: 'is_published', width: '15%', divider: true, align: 'center' },
                { text: '編集', sortable: false, value: 'actions', width: '10%', divider: true, align: 'center' },
            ],
            editedItem: {
                id: null,
                title: '',
                summary: '',
                content: '',
                publish_order: null,
            },
            title: '',
            summary: '',
            content: '',
            image: {},
            Rules: [
                v => !!v || '入力必須です',
            ],
            loading: false,
            dialog: false,
            dialog_title: 'お知らせの編集',
            remove_dialog: false,
            success: false
        }
    },
    methods: {
        editItem(item){
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },
        updateNews() {
            let editedIndex = this.news.findIndex(item => item.id === this.editedItem.id)
            Object.assign(this.news[editedIndex], this.editedItem)
        },
        displayMessage(){
            this.success = true
            setTimeout(this.hideMessage, 2500)
        },
        hideMessage(){
            this.success = false
        },
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
</style>