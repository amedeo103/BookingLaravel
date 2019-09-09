//todo

<template>

  <div class="card-deck mx-auto p-5">
    <div v-for="unit in units" v-bind:key="unit.id" >
    <div class="card m-1" style="width: 18rem;">
      <img src="http://growthinvestmentgroup.com/NoPropertyImg/no-property-image.gif" class="card-img-top" alt="Slika objekta">
      <div class="card-body">
        <h5 class="card-title">{{unit.name}}</h5>
        <p class="card-text">Max persons: {{unit.max_persons}}<br>Price per night: <strong>{{unit.price_per_night}} kn</strong></p>
        <a href="#" @click="editUnit(unit)" class="btn btn-primary">Edit</a>
        <a href="#" @click="deleteUnit(unit.id)" class="btn btn-primary">Delete</a>

      </div>
    </div>
  </div>
</div>
</div>
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
        created(){
          this.fetchUnits();
        },
        methods: {
          editUnit(unit){
            this.$cookies.set('key', unit);
            window.location.href='/edit_unit';
          },
          fetchUnits(){
            fetch('api/units').then(res => res.json()).then(res=>{
              this.units = res.data;
            });
          },
          deleteUnit(id){
            if(confirm('Are you sure ?')){
            fetch(`api/units/${id}`, {
              method: 'delete'})
              .then(res=>res.json())
              .then(data => {
                alert('Unit removed');
                this.fetchUnits();
              })
              .catch(err => console.log(err));
          }
          }
        }
      };
  </script>
