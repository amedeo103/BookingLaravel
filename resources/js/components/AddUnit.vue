<template>
  <form @submit.prevent="addUnit">
    <div class="card mx-auto p-5" style="width: 18rem;">
    <div class="form-group">
      <label for="name">Property name</label>
      <input type="text" class="form-control" id="name" ref="name"  placeholder="Enter name" v-model="unit.name">
    </div>
    <div class="form-group">
      <label for="max_persons">Max persons</label>
      <input type="number" class="form-control" id="max_persons" ref="max_persons" placeholder="Persons" v-model="unit.max_persons">
    </div>
    <div class="form-group">
      <label for="price_per_night">Price per night (kn)</label>
      <input type="number" class="form-control" id="price_per_night" ref="price_per_night" placeholder="Price" v-model="unit.price_per_night">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
          }
        },
        methods: {
          addUnit(){
            if(this.$refs.name.value!=''&&this.$refs.max_persons.value!=''&&this.$refs.price_per_night.value!=''){
              fetch('api/units', {
                method: 'post',
                body: JSON.stringify(this.unit),
                headers:{
                  'content-type': 'application/json'
                }
              })
              .then(res => res.json())
              .then(data => {
                this.unit.name='';
                this.unit.max_persons='';
                this.unit.price_per_night='';
                alert('Unit added');
                window.location.href = 'show_all_units';
              })
            }
          }
        }
      }
  </script>
