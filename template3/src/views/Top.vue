<template>
  <div class="top">
    <v-container fluid>
      <v-row justify="center" class="mt-5">
        <v-col cols="12" class="text-h5 text-center">【代表挨拶】</v-col>
        <v-col cols="12" md="9">
          <v-img
            src="@/assets/greeting.png"
            width="100%"
          />
        </v-col>
      </v-row>
      <v-row justify="center" class="mt-5">
        <v-col cols="12" class="text-h5 text-center">【業務紹介】</v-col>
        <v-col cols="12" md="10" class="text-body-1 text-left">
          システム開発におけるプロセスと品質の改善を目的として、多くのテスト経験で蓄積したテスト適性に優れたテストエンジニアのみで構成されております。<br>
          我々が繰り出す最適なテストプランにはインシデント管理・コスト/スケジュール管理を徹底したソフトウェアテストサービスを提供しています。
        </v-col>
        <v-col cols="12" class="text-body-1 text-center">〇構成員紹介</v-col>
        <v-col cols="12" md="8" class="mb-6">
          <v-row v-if="!$vuetify.breakpoint.mobile" justify="center">
            <v-col cols="3" class="text-body-1 text-center cell_top remove_border-right">
              ◆テスト経験数
            </v-col>
            <v-col cols="8" class="text-body-1 cell_top">
              総合150プロジェクト以上のシステムテスト経験
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              ◆テストマネジメント
            </v-col>
            <v-col cols="8" class="text-body-1 cell">
              テストの計画/見積やモニタリング、コントロール、リスクヘッジといった品質保証における製品の品質プランを高水準でご提供
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              ◆テストエンジニア
            </v-col>
            <v-col cols="8" class="text-body-1 cell">
              <ul>
                <li>経験に基づくテスト設計、スケジュール管理をハイエンドでご提示</li>
                <li>ユーザー目線でのインシデント管理や動作テスト</li>
                <li>テストで検知した不具合のご提示</li>
                <li>品質管理/改善の実現</li>
                <li>運用テスト</li>
              </ul>
            </v-col>
            <v-col cols="3" class="text-body-1 text-center cell remove_border-right">
              ◆レビュー
            </v-col>
            <v-col cols="8" class="text-body-1 cell">
              テスト経験に基づきハイエンドで実現
              <ul>
                <li>テストケースレビュー</li>
                <li>テストレビュー</li>
                <li>ユーザーレビュー</li>
              </ul>
            </v-col>
          </v-row>
          <!-- ↓モバイル(幅600px以下)の場合の表示 -->
          <v-row v-else>
            <v-col cols="12" class="text-body-1 text-center cell_top">
              ◆テスト経験数
            </v-col>
            <v-col cols="12" class="text-body-1 cell">
              総合150プロジェクト以上のシステムテスト経験
            </v-col>
            <v-col cols="12" class="text-body-1 text-center cell">
              ◆テストマネジメント
            </v-col>
            <v-col cols="12" class="text-body-1 cell">
              テストの計画/見積やモニタリング、コントロール、リスクヘッジといった品質保証における製品の品質プランを高水準でご提供
            </v-col>
            <v-col cols="12" class="text-body-1 text-center cell">
              ◆テストエンジニア
            </v-col>
            <v-col cols="12" class="text-body-1 cell">
              <ul>
                <li>経験に基づくテスト設計、スケジュール管理をハイエンドでご提示</li>
                <li>ユーザー目線でのインシデント管理や動作テスト</li>
                <li>テストで検知した不具合のご提示</li>
                <li>品質管理/改善の実現</li>
                <li>運用テスト</li>
              </ul>
            </v-col>
            <v-col cols="12" class="text-body-1 text-center cell">
              ◆レビュー
            </v-col>
            <v-col cols="12" class="text-body-1 cell">
              テスト経験に基づきハイエンドで実現
              <ul>
                <li>テストケースレビュー</li>
                <li>テストレビュー</li>
                <li>ユーザーレビュー</li>
              </ul>
            </v-col>
          </v-row>
        </v-col>
        <v-col cols="12" md="10" class="text-body-1">
          HappyPositionでは、総合150タイトル以上のテスト/QA経験者のみで構成された組織となるため、経験に基づいたハイエンドなご支援が可能と判断しています。
        </v-col>
        <v-col cols="12" md="10" class="text-body-1">
          ワークフローを熟知してチームの問題点となるものをピックアップし、より効果を高めるため、【Evolution（進化）とRevolution（革命/変革）】の模索/提案サイクルを行い、チームが自らのコーチ可能になることを目標としています。
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

.list {
  display: flex;
  align-items: center;
  flex-direction: column;
}
</style>