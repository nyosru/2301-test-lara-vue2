<template>
  <div class="row mt-2 mb-3">
    <div class="col-12">
      <b>
        {{ el.title }}
        <sup>
          {{ el.slug }}
          <a href="#" @click="itemDeleteLocal(el.id)">Удалить</a>
        </sup>
      </b>
    </div>

      <div class="col-6">

      <div class="text">
        {{ el.description ?? '' }}
      </div>
    </div>
    <div class="col-6">
      <b>Теги:</b>
      <!-- {{ el.tags }} -->
      <div v-for="t in el.tags" :key="t.id" class="px-2 py-1 tegInfo ">
        <abbr :title="t.slug">{{ t.title }}</abbr>
        <sup><a href="#" @click.prevent="deleteRecordTag(el.id,t.id)">удалить тег</a></sup>
      </div>

      <records-item-tags-form-add :record="el.id" :hasTags="el.tags"/>

    </div>
  </div>
</template>

<script setup>

import tags from './../use/tags.js'
import recordTags from './../use/recordTags.js'

import RecordsItemTagsFormAdd from './RecordsItemTagsFormAdd.vue'

const props = defineProps({
  el: Object,
})

const itemDeleteLocal = async (id) => {
  if (!confirm('удаляем ?')) return false

  let res = await itemDelete(id)
  console.log('res', res)
}

const { itemDelete } = tags()
const { deleteRecordTag } = recordTags()

</script>

<style scoped>
.text {
  padding-left: 30px;
  width: 250px;
}

.tegInfo:hover {
  background-color: rgba(0, 0, 250, 0.05);
}
</style>
