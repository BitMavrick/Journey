<template>
  <div class="container-scroller">
    <Sidebar />
    <div class="container-fluid page-body-wrapper">
      <Navbar />
    </div>
  </div>
</template>

<script>
import Sidebar from '@/components/Sidebar.vue'
import Navbar from '@/components/Navbar.vue'

export default {
  name: 'Appbar',
  components: {
    Sidebar,
    Navbar,
  }
}

</script>
