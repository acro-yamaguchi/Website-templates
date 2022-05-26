<template>
  <div class="about">
    <v-container fluid>
      <v-row justify="center" class="mt-5">
        <v-col cols="12" class="text-h5 text-center">【会社概要】</v-col>
        <v-col cols="12" md="8" class="mb-6">
          <v-row justify="center">
            <v-col cols="3" class="text-body-1 text-center cell_top remove_border-right">
              会社名
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell_top">
              株式会社Happy Position
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              設 立
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              2022年2月22日
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              資本金
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              2,000,000円
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              代 表
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              代表取締役 神田幸志朗
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              本 社
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              札幌市中央区北6条西11丁目ベル・グランドーレ 402
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              本 店
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              北海道札幌市南区北の沢1728-4 2F
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              主要取引銀行
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              北海道信用金庫 川沿支店
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              業務内容
            </v-col>
            <v-col cols="7" class="text-body-1 text-center cell">
              ソフトウェア/システムの品質保証、テスト事業
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
    }
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