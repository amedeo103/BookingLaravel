<template>
  <form action="/show_all_units">
    <div class="card mx-auto p-5" style="width: 18rem;">
      <div class="form-group">
        <label for="name">Property ID</label>
        <input type="text" class="form-control" v-model="unit.id" disabled>
      </div>
    <div class="form-group">
      <label for="name">Property name</label>
      <input type="text" class="form-control"v-model="unit.name">
    </div>
    <div class="form-group">
      <label for="max_persons">Max persons</label>
      <input type="number" class="form-control" v-model="unit.max_persons">
    </div>
    <div class="form-group">
      <label for="price_per_night">Price per night (kn)</label>
      <input type="number" class="form-control"v-model="unit.price_per_night">
    </div>
    <button type="submit" @click="editUnit(unit.id)" class="btn btn-primary">Edit</button>
  </div>
  </form>
</template>

  <script>
      export default{
        data(){
          return{
            units:[],
            unit: {
              id:'',
              name:'',
              max_persons: '',
              price_per_night: ''
            }
          };
        },
        created(){
           this.showUnit();
        },
        methods: {
          editUnit(id){
            fetch(`api/units/${id}`, {
              method: 'put',
              body: JSON.stringify(this.unit),
              headers:{
                'content-type': 'application/json'
              }
            })
            .then(res=>res.json())
            .then(data =>{
              this.unit.name='';
              this.unit.max_persons='';
              this.unit.price_per_night='';

            })
            .catch(err =>console.log(err));

            alert('Unit updated');
          },
          showUnit(){
            this.unit.id = this.$cookies.get("key").id;
            this.unit.name = this.$cookies.get("key").name;
            this.unit.max_persons = this.$cookies.get("key").max_persons;
            this.unit.price_per_night = this.$cookies.get("key").price_per_night;
          }
        }
      }
  </script>
