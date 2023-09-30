<template>
  <div v-if="isAuthenticated" class="container-scroller">
    <Sidebar />
    <div class="container-fluid page-body-wrapper" :class="[{ 'full-page-wrapper': !isAuthenticated }]">
      <Navbar />
      <div class="main-panel">
        <router-view />
        <Footer />
      </div>
    </div>
  </div>

  <router-view v-if="!isAuthenticated" />
</template>

<script>
import Sidebar from '@/components/Sidebar.vue'
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
import { useStore } from 'vuex';

export default {
  name: 'App',
  components: {
    Sidebar,
    Navbar,
    Footer,
  },
  setup() {
    const store = useStore();

    // Check if the user is authenticated
    store.dispatch('checkAuth');

    return {
      store,
    }
  },

  computed: {
    authenticated() {
      // Get the authenticated state from the store
      return this.store.state.authenticated;
    },
    isAuthenticated() {
      // Determine whether to show the sidebar based on the current route and authentication state
      return this.authenticated && this.$route.name !== 'login' && this.$route.name !== 'signup';
    }
  }
}

</script>
