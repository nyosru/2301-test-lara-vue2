<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <tags-form-add/>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">Теги</div>

          <div class="card-body">
            <div v-if="resLoading">
              ... загружаю с апи .. пару сек
              <br />
              ..
              <br />
              ..
              <br />
              ..
              <br />
              ..
              <br />
              <nav aria-label="..." v-if="listMeta.links">
                <ul class="pagination">
                  <li>..</li>
                </ul>
              </nav>
            </div>
            <div v-else>
              <data-item v-for="el in list" :key="el" :el="el" />
              <tags-pages />
            </div>

            <button @click="showTeh = !showTeh" class="mt-3">
              тех инфа (скрыть/показать)
            </button>
            <div v-if="showTeh">
              list: {{ list }}
              <br />
              listMeta: {{ listMeta }}
              <br />
              resError: {{ resError }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from '@vue/reactivity'

import TagsPages from './TagsPages.vue'
import TagsFormAdd from './TagsFormAdd.vue'
import DataItem from './TagsItem.vue'

import tags from './../use/tags.js'
const {
  loadData,
  list,
  listMeta,
  resError,
  resLoading,
  nowPage,
  nowPageLoad,
} = tags()

const showAddForm = ref(false)

const showTeh = ref(false)
</script>
