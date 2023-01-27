<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div id="dynamic-component-demo" class="demo">
          <button
            v-for="tab in tabs"
            :key="tab"
            class="tab-button btn"
            :class="[{ 'btn-success': currentTab === tab.component }]"
            @click="currentTab = tab.component"
          >
            {{ tab.name }} {{ tab.component }}
          </button>

          <!-- <component :is="currentTab" class="tab"></component> -->

          <br />
          <br />

          <transition>
            <home-component v-if="(currentTab == 'HomeComponent')" />
            <records-component v-else-if="(currentTab == 'RecordsComponent')" />
            <tags-component v-else-if="(currentTab == 'TagsComponent')" />
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from '@vue/reactivity'

import HomeComponent from './../HomeComponent.vue'
import RecordsComponent from './../RecordsComponent.vue'
import TagsComponent from './../TagsComponent.vue'

console.log('Component mounted.')

let currentTab = ref('HomeComponent')
const tabs = [
  { name: 'Старт', component: 'HomeComponent' },
  { name: 'Записи', component: 'RecordsComponent' },
  { name: 'Теги', component: 'TagsComponent' },
]
</script>

<style scope>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
