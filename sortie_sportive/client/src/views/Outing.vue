<template>
  <div class="outing">
    <FormOuting @send-data="submit" />
  </div>
</template>

<script>
// @ is an alias to /src
import FormOuting from '../components/FormOuting.vue'
import axios from 'axios'

export default {
  name: 'Outing',
  components: {
    FormOuting
  },
  methods: {
    submit(value){
      let values = Object.assign({}, value);
      console.log(localStorage.getItem('id'))
      values['id'] = parseInt(localStorage.getItem('id'))
      console.log("JE suis une value", values);

      axios.post("http://localhost:8000/outing/create", values)
      .then(response => {
        console.log("nouvelle sortie", response.data.user)
        if (response.data.code){
          this.$router.push({ name: "Register" }); 
        }
      })
      .catch(error => {
        console.log(error);
      })
    },


  }
}
</script>
