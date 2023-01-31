<template>
  <div class="row mb-3">
    <div class="col-6">
      <b>
        {{ el.title }}
        <sup>
          {{ el.slug }}
          <a href="#" @click="itemDeleteLocal(el.id)">Удалить</a>
        </sup>
      </b>
      <br />
      <div class="text">
        {{ el.description ?? '' }}
      </div>
    </div>
    <div class="col-6">
      <b>Теги:</b>
      <!-- {{ el.tags }} -->
      <div v-for="t in el.tags" :key="t.id" class="tegInfo mb-1">
        <abbr :title="t.slug">{{ t.title }}</abbr>
        <sup><a href="#" @click="deleteRecordTag(el.id,t.id)">удалить тег</a></sup>
      </div>
    </div>
  </div>
</template>

<script setup>
import tags from './../use/tags.js'
import recordTags from './../use/recordTags.js'

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
  background-color: rgba(0, 0, 0, 0.15);
}
</style>
