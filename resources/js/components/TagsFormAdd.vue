<template>
  <div class="mb-2">
    addResult: {{ addResult }}
    <br />
    addLoading: {{ addLoading }}
    <br />
    addError: {{ addError }} / {{ addError.length }}
    <br />

    <br />
    addErrorStr: {{ addErrorStr }}
    <br />

    <div
      v-for="(item, index) in addError"
      :key="item"
      class="alert alert-danger mb-1"
    >
      <b>{{ index }}</b>
      <br />
      <div v-for="i in item">
        {{ i }}
      </div>
    </div>

    <transition>
      <button
        class="btn btn-success"
        v-if="!showAddForm"
        @click="showAddForm = !showAddForm"
      >
        добавить ТЕГ
      </button>
    </transition>
    <transition>
      <form v-if="showAddForm" @submit.prevent="addData">
        Форма добавления тега
        <br />
        <input type="text" name="tag" v-model.trim="formTagTitle" required />
        <br />
        <button class="btn btn-success" type="submit">Добавить</button>
      </form>
    </transition>
  </div>
</template>

<script setup>
import tags from './../use/tags.js'
import { ref } from '@vue/reactivity'

const showAddForm = ref(false)

const {
  //   loadData,
  //   list,
  //   listMeta,
  //   resError,
  //   resLoading,
  //   nowPage,
  //   nowPageLoad,
  addData,
  formTagTitle,
  addResult,
  addLoading,
  addError,
  addErrorStr,
} = tags()
</script>
