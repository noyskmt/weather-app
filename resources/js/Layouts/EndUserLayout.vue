<template>
  <div id="app">
    <div class="root-wrap">
      <Header />

      <!-- slotに読込元のファイルが入る -->
      <slot />
    </div>
  </div>
</template>

<script>
import Header from '@/Components/EndUser/Header.vue'
export default {
  components: {
    Header
  }
}
</script>
