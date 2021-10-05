<template>
  <div class="profile">
    <h1>This is an about outings </h1>
    <!-- <h3> Les sorties de {{infosUser[0].userId.name}} </h3> -->
    <table class="table text-white bg-dark">
        <thead>
          <tr>
            <th scope="col">Sortie</th>
            <th scope="col">Date de départ</th>
            <th scope="col">Date de retour</th>
            <th scope="col">Heure de depart</th>
            <th scope="col">Heure arrivée</th>
            <th scope="col">Distance</th>
            <th scope="col">Commentaire</th>
          </tr>
        </thead>
        <tbody :key="index" v-for="(infoUser, index) in infosUser" >
          <tr>
            <th scope="row">{{infoUser.type}}</th>
            <td>{{infoUser.startAt}}</td>
            <td>{{infoUser.lastAt}}</td>
            <td>{{infoUser.startTime}}</td>
            <td>{{infoUser.endTime}}</td>
            <td>{{infoUser.distance}}</td>
            <td>{{infoUser.comment}}</td>
          </tr>
        </tbody>
    </table>
  </div>
</template>

<script>

import axios from "axios";

  export default {
    name: 'Profile',
    data(){
    return {
      infosUser: null
      }
    },
    mounted(){
      console.log('component mounted', this.$route.params['id']);
      const id = this.$route.params['id']
      axios.get("http://localhost:8000/user/" + id)
      .then((response) => {console.log(this.infosUser = response.data.user)})
      .catch(error => {
        console.log("voilà l'erreur:", error)
      })
    }
  }
</script>

