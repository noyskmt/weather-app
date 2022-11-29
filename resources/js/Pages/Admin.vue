<template>
  <layout title="ブランド一覧">
    <h1>Hoge</h1>
  </layout>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'

export default {
  layout: AdminLayout,
  props: {
    user: Object
  },
  mounted() {
    console.log(this.user)
  },
}
</script>
