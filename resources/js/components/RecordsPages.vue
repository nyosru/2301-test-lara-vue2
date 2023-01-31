<template>
  <div>

    <nav aria-label="..." v-if="listMeta.links">
      
      <ul class="pagination">

        <template v-for="p in listMeta.links">
          <!-- <li>{{ p }}</li> -->

          <!-- <li class="page-item disabled">
            <a class="page-link">Previous</a>
          </li> -->

          <li v-if="p.label > 0" class="page-item">
            <a
              class="page-link"
              :class="[{ active: p.label == nowPage }]"
              @click.prevent="nowPage = p.label"
              href="#"
            >
              {{ p.label }}
            </a>
          </li>

          <li v-else-if="p.label == '...'" class="page-item">
            <span class="page-link">...</span>
          </li>

        </template>
      </ul>
    </nav>
  </div>
</template>

<script setup>
import records from './../use/records.js'

const {
  loadData,
  list,
  listMeta,
  resError,
  resLoading,
  nowPage,
  nowPageLoad,
} = records()

</script>
