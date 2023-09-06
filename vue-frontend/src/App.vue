<template>
  <div class="container-scroller">
    <Sidebar v-if="showSidebar" />
    <div class="container-fluid page-body-wrapper" :class="[{ 'full-page-wrapper': showAdditionalClass }]">
      <Navbar v-if="showSidebar" />
      <div class="main-panel">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from '@/components/Sidebar.vue'
import Navbar from '@/components/Navbar.vue'

export default {
  name: 'App',
  components: {
    Sidebar,
    Navbar,
  },
  computed: {
    showSidebar() {
      // Determine whether to show the sidebar based on the current route
      return this.$route.name !== 'login' && this.$route.name !== 'signup';
    },
    showNavbar() {
      // Determine whether to show the navbar based on the current route
      return this.$route.name !== 'login' && this.$route.name !== 'signup';
    },
    showAdditionalClass() {
      // Determine whether to add the additional class based on the current route
      return this.$route.name === 'login' || this.$route.name === 'signup';
    },
  }
}

</script>
