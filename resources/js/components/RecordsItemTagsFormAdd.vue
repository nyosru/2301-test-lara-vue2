<template>
  <div class="text-end" >
    <a href="#" @click.prevent="showForm = !showForm" >добавить tag к record (скрыть/показать)</a>
    <div v-if="showForm">
    <div v-if="dataAllLoading">.. ван секанд, идёт загрузка ..</div>
    <div v-else>
      <select v-model="tagsIdToAdd" class="form-select" >
        <option v-for="o in dataAll" :key="o" :value="o.id" >{{ o.title }}</option>
      </select>
      <button type="button" @click="addRecordTag(record,tagsIdToAdd)" class="btn btn-xs btn-success">Добавить</button>
    </div>
    </div>
    <!-- dataAll: {{ dataAll }} -->
  </div>
</template>

<script setup>

import { ref } from '@vue/reactivity'
import tags from './../use/tags.js'
import recordTags from './../use/recordTags.js'

const showForm = ref(false)

const props = defineProps({
  record: Number,
  hasTags: Object,
})

const { dataAll, loadDataAll, dataAllLoading } = tags()
const { deleteRecordTag, addRecordTag } = recordTags()

if (dataAllLoading.value === false) {
  loadDataAll()
}
</script>

<style scoped></style>
