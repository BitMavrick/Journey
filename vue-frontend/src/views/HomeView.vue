<template>
  <div class="content-wrapper">

    <!-- Loading screen component -->
    <div v-if="isLoading" class="loading-screen">
      Loading...
    </div>
    <div v-else>
      <!-- Your existing content -->
      <!-- ... -->
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
              <div class="row align-items-center">
                <div class="col-5 col-sm-7 col-xl-8 p-4">
                  <h2 class="mb-1 mb-sm-0">Saturday, September 09</h2>
                  <h4 class="mb-0 font-weight-normal d-none d-sm-block pt-2">Year: 2023
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Today</h3>
              <!-- Start from here -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

export default {
  name: "Home",
  setup() {
    const isLoading = ref(true); // Boolean to track loading state
    const store = useStore();
    const router = useRouter();

    onMounted(async () => {
      try {
        const response = await fetch('http://localhost:8000/api/user', {
          headers: {
            'Content-Type': 'application/json'
          },
          credentials: 'include',
        });

        // Log the fetched data to the console
        const data = await response.json();
        console.log('Fetched data:', data.error);

        if (data.error) {
          router.push('/login');
        }

        await store.dispatch('setAuth', true);
        isLoading.value = false;
      } catch (e) {
        router.push('/login');
        await store.dispatch('setAuth', false);
        isLoading.value = false;
      }
    });

    return {
      isLoading
    }
  },
};
</script>

<style>
.loading-screen {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>

