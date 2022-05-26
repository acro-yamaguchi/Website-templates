<template>
    <div class="editNews">
        <v-container fluid>
            <v-row justify='center'>
                <v-col cols="12" md='10'>
                    <v-expansion-panels>
                        <addNewsAccordion></addNewsAccordion>
                        <editNewsAccordion class="mt-5"></editNewsAccordion>
                    </v-expansion-panels>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import addNewsAccordion from '../components/AddNewsAccordion.vue'
import editNewsAccordion from '../components/EditNewsAccordion.vue'
export default {
    components: {
        addNewsAccordion,
        editNewsAccordion,
    },
    data() {
        return {}
    }
}
</script>