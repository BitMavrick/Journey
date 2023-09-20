<template>
  <div class="content-wrapper">
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
</template>

<script>
import { onMounted, ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

export default {
  name: "Home",
  setup() {
    const message = ref('Your are not logged in.');
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
          console.log("Hello");
          router.push('/login');
        }

        await store.dispatch('setAuth', true)
      } catch (e) {
        router.push('/login');
        await store.dispatch('setAuth', false)
      }
    });

    return {
      message
    }
  },
};
</script>

