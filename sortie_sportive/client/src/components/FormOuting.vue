<template>
    <div class="container">
        <h1>Préparer votre sortie</h1>
        <div class="mb-3">
            <select v-model="form.type" class="form-select form-select-lg rounded-0" aria-label=".form-select-lg example">
                <option selected>Selectionner votre sortie</option>
                <option value="velo">Vélo</option>
                <option value="pied">À pied</option>
                <option value="canoe">Canoe</option>
                <option value="trotinette">Trotinette</option>
                <option value="mobilette">Mobilette</option>
            </select>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <input v-model="form.start_date" type="date" class="form-control p-2 rounded-0" 
            id="exampleInputType" required placeholder="Entrer la date de debut" aria-describedby="typeHelp">
            <div class="mb-3">
                <label for="appt-time">Heure de début de sortie:</label>
                <input id="appt-time" v-model="form.start_time" type="time" name="appt-time" >
            </div>
        </div>

        <div class="mb-3 d-flex justify-content-center">
            <input v-model="form.end_date" type="date" class="form-control p-2 rounded-0" 
            id="exampleInputType" required placeholder="Entrer la date de fin" aria-describedby="typeHelp">
            <div class="h">
                <label for="appt-time">Heure de fin de sortie:</label>
                <input id="appt-time" v-model="form.end_time" type="time" name="appt-time" >
            </div>
        </div>
        <div class="mb-3">
            <input v-model="form.distance" type="number" class="form-control p-2 rounded-0" 
            id="exampleInputType" required placeholder="Entrer la distance à parcourir" aria-describedby="typeHelp">
        </div>
        <div class="form-floating">
            <textarea v-model="form.comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
        </div>
        <input id="prodId" name="prodId" type="hidden" v-model="form.id_user" >
         <div class="text-danger mb-2 mt-2"> {{ warning }}</div>
        <button type="submit" v-on:click="submit" class="btn btn-primary mt-4"> Soumettre </button>
    </div>
</template>

<script>

export default {
    name: 'FormOuting',
    emits: ["send-data"],
    props: {
        method: { type:Function },
    },
    data() {
       return {
           form: {
               type: '',
               start_date: '',
               start_time: '',
               end_date: '',
               end_time: '',
               distance: '',
               comment: '',
               id_user: ''
               
           },
           warning: "",
       } 
    },
    methods: {
        paramsStorage() {
           let params=localStorage.getItem('id', response.data.user[0]['id'])

        },
        submit () {
            if(this.form.type === "" && this.form.start_date==="" && this.form.end_date ==="" 
            && this.form.distance ==="" && this.form.start_time ==="" && this.form.end_time ==="")
            {
                this.warning = "Veuillez remplir tous les champs";
            }else{
                console.log(this.form)
                this.$emit("send-data", this.form);
            }
        }
    }
}
</script>

<style scoped>

</style>
