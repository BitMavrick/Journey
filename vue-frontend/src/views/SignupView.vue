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
                            <h3 class="card-title text-left mb-3">Signup</h3>
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input v-model="data.name" type="text" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input v-model="data.email" type="email" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input v-model="data.password" type="password" class="form-control p_input">
                                </div>

                                <div class="form-group">
                                    <label>Re-enter Password</label>
                                    <input type="password" class="form-control p_input">
                                </div>

                                <br>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Create
                                        Account</button>
                                </div>
                                <p class="sign-up text-center">Already have an Account?<router-link to="/login"> Log
                                        In</router-link></p>
                                <p class="terms">By creating an account you are accepting our<a href="#"> Terms &
                                        Conditions</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue';
import { useRouter } from 'vue-router';

export default {
    name: "Register",
    setup() {
        const data = reactive({
            name: '',
            email: '',
            password: ''
        });

        const router = useRouter();

        const submit = async () => {
            await fetch('http://localhost:8000/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            await router.push('/login');
        }

        return {
            data,
            submit
        }
    }
}

</script>