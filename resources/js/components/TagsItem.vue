<template>
  <div>
    {{ el.title }} 
    / {{ el.slug }}
    <abbr title="кол-во использования в records" class="alert alert-danger p-1" >{{ el.records_count }}</abbr>
    <sup><a href="#" @click="itemDeleteLocal(el.id)">Удалить</a></sup>
    <br/>
    <br/>
    {{ el }}
    <br/>
    <br/>
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