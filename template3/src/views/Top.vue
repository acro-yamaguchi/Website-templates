<template>
    <div>
        <v-main>
          <v-container fluid class="pa-0">
              <section id="section1">
                  <v-row no-gutters justify="center">
                      <v-col cols="12" class="text-center text-h3 mt-12">SECTION1</v-col>
                      <v-col cols="10" class="text-center text-body-1 pre-line mb-12">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum eros quam. Praesent condimentum egestas massa ac gravida. Nam sed hendrerit turpis, id pharetra nulla. Quisque hendrerit velit accumsan tellus dictum rhoncus. Praesent in feugiat sapien. Nullam posuere augue non tempor porta. Duis varius est tellus, sit amet rhoncus massa accumsan id. Vestibulum mollis rutrum urna, eu scelerisque nibh dignissim ac. Proin ut rhoncus sapien, eu tristique orci. Suspendisse iaculis neque vitae nibh ullamcorper rutrum. Quisque at dui quis tellus sodales aliquet id nec erat. Donec metus erat, aliquam quis nulla non, tincidunt vestibulum sapien. Ut volutpat tincidunt felis, nec consequat lacus volutpat tempus.
                          
                          Pellentesque pellentesque vulputate ex, non rhoncus massa fringilla et. Proin dapibus ornare tortor, non malesuada lorem blandit ut. Nullam vehicula tortor et magna consectetur venenatis. Donec feugiat lorem non nisi posuere condimentum. Phasellus sed erat et lorem imperdiet convallis non eget erat. Curabitur nec rutrum justo. Sed et fringilla quam. Sed tincidunt aliquet nunc, in aliquet massa eleifend nec. Vivamus vulputate sodales nisl. Duis rutrum non tortor ac mattis. Aliquam viverra et erat quis porta. Pellentesque dignissim commodo nunc, scelerisque volutpat enim tempor nec. Fusce mattis nunc nisl, convallis pretium neque dapibus sed. Aenean non lorem sit amet mi placerat porttitor. Etiam iaculis, libero ac pellentesque consectetur, leo tellus bibendum justo, ac tempus sapien dolor sit amet enim.
                      </v-col>        
                  </v-row>
              </section>

              <section id="section2" class="grey lighten-3">
                  <v-row no-gutters justify="center">
                      <v-col cols="12" class="text-center text-h3 mt-12">SECTION2</v-col>
                      <v-col cols="10" class="text-center text-body-1 pre-line mb-12">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus. Vivamus et tristique magna, sed vehicula nunc. Etiam aliquet varius dui, vel consectetur risus. Pellentesque gravida elit eu enim gravida fringilla. In lorem risus, semper sed enim ut, posuere pulvinar justo. Ut dapibus tellus vehicula lacus finibus venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis ornare urna est, non pulvinar est molestie at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu dapibus est. Aliquam pretium turpis purus, id bibendum tortor suscipit in. Integer sed quam id neque pretium sagittis vitae et dui. Morbi vehicula aliquam ex ac scelerisque.
                      </v-col>        
                  </v-row>
              </section>

              <section id="access" class="black">
                  <v-row no-gutters justify="center">
                      <v-col cols="12" class="text-center text-h3 my-12 white--text">ACCESS</v-col>
                      <v-col cols="12" md="6" class="text-center white--text text-h6 pre-line pl-6 py-12">
                          <span class="text-h5">株式会社サンプル</span>
                          
                          〒XXX-XXXX ○○県○○市○○区 X-X-X

                          営業時間：10:00 - 17:00

                          休業日：土日祝、年末年始

                          TEL：XXXX-XX-XXXX
                      </v-col>        
                      <v-col cols="12" md="6" class="pl-6 pb-6 pr-6">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.6566075689298!2d139.80851171436308!3d35.71006703599915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ed0d12f9adf%3A0x7d1d4fb31f43f72a!2z5p2x5Lqs44K544Kr44Kk44OE44Oq44O8!5e0!3m2!1sja!2sjp!4v1652861597044!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </v-col>
                  </v-row>
              </section>
          </v-container>
      </v-main>
    </div>
</template>

<script>
import Img1 from "@/assets/img1.jpg"
import Img2 from "@/assets/img2.jpg"
import Img3 from "@/assets/img3.jpg"
import Img4 from "@/assets/img4.jpg"

export default {
  name: 'App',

  data: () => ({
            title: 'Sample2',
            img_items: [
                { src: Img1 },
                { src: Img2 },
                { src: Img3 },
                { src: Img4 }
            ],
            carousel_height: window.innerHeight,
            top_div_style: {
                width: '100%',
                position: 'absolute',
                top: '0px',
                left: '0px',
                height: window.innerHeight + 'px',
            },
            list_items: [
                {
                    icon: 'mdi-account-check',
                    title: 'Title 1',
                    text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sint possimus quidem atque harum excepturi nemo velit tempora! Enim inventore fuga, qui ipsum eveniet facilis obcaecati corrupti asperiores nam.',
                },
                {
                    icon: 'mdi-alarm-check',
                    title: 'Title 2',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus. Vivamus et tristique magna, sed vehicula nunc. Etiam aliquet varius dui, vel consectetur risus. Pellentesque gravida elit eu enim.',
                },
                {
                    icon: 'mdi-shield-check-outline',
                    title: 'Title 3',
                    text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sint possimus quidem atque harum excepturi nemo velit tempora! Enim inventore fuga, qui ipsum eveniet facilis obcaecati corrupti asperiores nam.',
                },
                {
                    icon: 'mdi-car-wash',
                    title: 'Title 4',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus. Vivamus et tristique magna, sed vehicula nunc. Etiam aliquet varius dui, vel consectetur risus. Pellentesque gravida elit eu enim.',
                },
            ],
            drawer: false,
            navi_list: [
              { title: 'TOP' },
              { title: 'PAGE 2' },
              { title: 'PAGE 3' },
            ],
        }),
};
</script>

<style scoped>
  .pre-line {
    white-space: pre-line;
  }
</style>