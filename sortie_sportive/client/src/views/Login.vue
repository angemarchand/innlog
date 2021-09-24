<template>
    <div>
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
                localStorage.setItem('id', response.data.user[0]['id']);
                console.log("le token");
            if(response.data["code"] === 200){
               this.$router.push({ name: "Home" }); 
            }
            })
            .catch(error => {
                console.log(error);
            })
            
        }
    }
}
</script>