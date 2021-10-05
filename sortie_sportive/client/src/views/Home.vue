<template>
  <div class="Home">
    <h1 class="m-4">BIENVENUE CHEZ OUTINGS SPORT </h1>
    <div class="card-cart-container">
      <div class="card-container">
        <div> {{infos}} </div>
      </div>
    </div>
    
  </div>
</template>

<script>

import axios from 'axios';

export default {
  
  name:'Home',

  data(){
    return {
      infos: []
    }
    
  },
  mounted() {
      //console.log('Upload component', this.infos);
      axios.get("http://localhost:8000/outing/", )
      .then(response => console.log((this.infos = response.data.user)))
  },

}
</script>
