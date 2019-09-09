UnitToBook
<template>

  <form @submit.prevent="addReservation">
    <div class="card mx-auto p-5" style="width: 18rem;">
    <div class="form-group">
      <label for="unit_id">Unit ID: </label>
      <input type="text" class="form-control"  v-model="unit.id" disabled>
    </div>
    <div class="form-group">
      <label for="date_from">Date from: </label>
      <input type="date" class="form-control" id="date_from" ref="date_from" placeholder="Date from" v-model="reservation.date_from" >
    </div>
    <div class="form-group">
      <label for="date_to">Date to: </label>
      <input type="date" class="form-control" id="date_to" ref="date_to" placeholder="Date to" v-model="reservation.date_to">
    </div>

    <div class="form-group">
      <label for="first_name">First name: </label>
      <input type="text" class="form-control" id="first_name" ref="first_name" placeholder="First name" v-model="reservation.first_name">
    </div>

    <div class="form-group">
      <label for="last_name">Last name: </label>
      <input type="text" class="form-control" id="last_name" ref="last_name" placeholder="Last name" v-model="reservation.last_name">
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="email" class="form-control" id="email" ref="email" placeholder="Email" v-model="reservation.email">
    </div>

    <button type="button" @click="getPrice(reservation.date_from, reservation.date_to)"  class="btn btn-primary">Calculate Price</button>


  <div class="form-group" >
    <label for="total_price">Total price: </label>
    <input type="text" class="form-control" placeholder="Price" v-model="price" disabled>
  </div>
  <button type="submit"  class="btn btn-primary">Submit</button>
  </div>
  </form>

</template>
  <script>
  import DatePick from 'vue-date-pick';
  var moment = require('moment');
      export default{

        components: {DatePick},


        data(){
          return{
            price:'',
            moment:moment,
            units:[],
            unit: {
              id:'',
              name:'',
              max_persons: '',
              price_per_night: ''
            },
            reservations:[],
            reservation:{
              id:'',
              unit_id:'',
              date_from:'',
              date_to:'',
              first_name:'',
              last_name:'',
              email:''
            },
          }
        },
        created(){
          this.displayUnitId();
        },
        methods:{
        addReservation(){
          if(confirm('Are you sure ?')){
            fetch('api/reservation', {
              method: 'post',
              body: JSON.stringify(this.reservation),
              headers:{
                'content-type': 'application/json'
              }
            })
            .then(res => res.json())
            .then(data => {
              this.reservation.unit_id='';
              this.reservation.date_from='';
              this.reservation.date_to='';
              this.reservation.first_name='';
              this.reservation.last_name='';
              this.reservation.email='';
              alert('Reservation added');
              window.location.href = 'reservation_index';
            })
            .catch(err => console.log(err));
          }
        },
        getPrice(dateF, dateT){
          var a = moment(dateF).format("dd-MM-YYYY");

           dateF = moment(dateF, "YYYY-MM-DD");
           dateT = moment(dateT, "YYYY-MM-DD");
           var days =moment.duration(dateT.diff(dateF)).asDays();
           this.price =this.unit.price_per_night * days + ' kn';
        },
        displayUnitId(){

            this.unit.id = this.$cookies.get("UnitToBook").id;
            this.unit.name = this.$cookies.get("UnitToBook").name;
            this.unit.max_persons = this.$cookies.get("UnitToBook").max_persons;
            this.unit.price_per_night = this.$cookies.get("UnitToBook").price_per_night;
            this.reservation.unit_id = this.$cookies.get("UnitToBook").id;
          },
        }
      }
  </script>
