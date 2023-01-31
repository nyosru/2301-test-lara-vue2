<template>
  <div>{{ el.title }} / {{ el.slug }}
    <sup><a href="#" @click="itemDeleteLocal(el.id)">Удалить</a></sup>
  </div>
</template>

<script setup>
import tags from './../use/tags.js'

const props = defineProps({
  el: Object
})

const itemDeleteLocal = async(id) => {

  if( !confirm('удаляем ?') )
  return false

  let res = await itemDelete(id)
  console.log('res',res);
}

const {
  itemDelete
} = tags()

</script>