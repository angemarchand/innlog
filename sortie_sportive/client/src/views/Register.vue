<template>
    <div >
        <register-form @sending-message="submit"/>
    </div>
        

</template>

<script>
// @ is an alias to /src
import RegisterForm from '../components/RegisterForm.vue'
import axios from 'axios'

export default {
    name: 'Register',
    components: {
        RegisterForm
    },
    methods: {
        submit(value){
            let userData = Object.assign({}, value);
            console.log("i am new data", userData);
            
            // Simple POST request with a JSON body using axios
            axios.post("http://localhost:8000/user/register", userData)
              .then(response => {
                  console.log(" inscrit", response.data)
                  if(response.data.code === 200){
                      this.$router.push({ name: "Login" });
                  }
                })
                .catch(error => {
                    console.log(error)
                })

            }
        }
}
</script>
