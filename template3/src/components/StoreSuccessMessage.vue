<template>
    <div class="message">
        <v-card class="pa-2 card" width="150" height="40">
            <div class="d-flex justify-center align-center">
                <span class="text-body-1">登録完了</span>
                <v-icon class="ml-2" color="green">mdi-check-circle</v-icon>
            </div>
        </v-card>
    </div>
</template>

<style scoped>
.message {
    position: fixed;
    bottom: 60px;
    right: 12px;
    z-index: 205;
}
.card {
    border: solid 2px rgb(120, 240, 30);
}
</style>