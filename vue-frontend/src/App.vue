<template>
  <div v-if="showSidebar" class="container-scroller">
    <Sidebar />
    <div class="container-fluid page-body-wrapper" :class="[{ 'full-page-wrapper': showAdditionalClass }]">
      <Navbar />
      <div class="main-panel">
        <router-view />
        <Footer />
      </div>
    </div>
  </div>

  <router-view v-if="!showSidebar" />
</template>

<script>
import Sidebar from '@/components/Sidebar.vue'
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'

export default {
  name: 'App',
  components: {
    Sidebar,
    Navbar,
    Footer,
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
