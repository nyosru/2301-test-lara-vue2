<template>
  <div class="mb-2">
    <!-- addResult: {{ addResult }}
    <br />
    addLoading: {{ addLoading }}
    <br />
    addError: {{ addError }} / {{ addError.length }}
    <br />

    <br />
    addErrorStr: {{ addErrorStr }}
    <br /> -->

    <div v-if="addResult" class="alert alert-success">
      Запись добавлена
    </div>

    <div
      v-for="(item, index) in addError"
      :key="item"
      class="alert alert-danger mb-1"
    >
      <div class="container">
        <div class="row">
          <div class="col-3 text-end">
            <b>{{ index }}</b>
          </div>
          <div class="col-9">
            <div v-for="i in item" :key="i">
              {{ i }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <transition>
      <button
        class="btn btn-success"
        v-if="!showAddForm"
        @click="showAddForm = !showAddForm"
      >
        добавить Запись
      </button>
    </transition>
    <transition>
      <form v-if="showAddForm" @submit.prevent="addData">
        Форма добавления тега
        <br />
        <input type="text" v-model.trim="formRecordTitle" required />
        <br />
        <textarea v-model.trim="formRecordDesc" />
        <br />
        <input type="file"  />
        <br />
        <div v-if="addLoading" >Загружаю ...</div>
        <button v-else class="btn btn-success" type="submit">Добавить</button>
      </form>
    </transition>
  </div>
</template>

<script setup>
import records from './../use/records.js'
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
} = records()
</script>
