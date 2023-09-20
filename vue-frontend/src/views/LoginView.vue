<template>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <p class="terms">
                                <img src="assets/images/logo.svg" alt="logo" style="width: 200px; height: 40px;" />
                            </p>
                            <br>
                            <br>
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input v-model="data.email" type="email" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input v-model="data.password" type="password" class="form-control p_input">
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>

                                <p class="sign-up">Don't have an Account?<router-link to="/signup"> Sign Up</router-link>
                                </p>
                                <p class="terms"><a href="#">Terms &
                                        Conditions</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</template>


<script>

import { reactive } from 'vue';
import { useRouter } from 'vue-router';

export default {
    name: "Login",
    setup() {
        const data = reactive({
            email: '',
            password: ''
        });

        const router = useRouter();

        const submit = async () => {
            await fetch('http://localhost:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                credentials: 'include',
                body: JSON.stringify(data)
            });

            await router.push('/');
        }

        return {
            data,
            submit
        }
    }
};
</script>