<template>
    <div class="mb-5">
        <register-form @sending-message="submit" />
    </div>
        

</template>

<script>
// @ is an alias to /src
import axios from 'axios'
import RegisterForm from '../components/RegisterForm.vue'

export default {
    name: 'Login',
    components: {
        RegisterForm
    },
    methods: {
        submit(value){
            let userData = Object.assign({}, value);
            console.log("i am login data", userData);
            axios.post("http://localhost:8000/user/login", userData)
            .then(response => {
                console.log("Connecté", response.data)
                localStorage.setItem('id', response.data[0]['id']);
                console.log("id user");
            if(response.status === 200){
               this.$router.push({ name: "Outing" }); 
            }
            })
            .catch(error => {
                console.log(error);
            })
            
        }
    }
}
</script>