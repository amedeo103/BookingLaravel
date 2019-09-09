<template>
  <div class="card-deck mx-auto p-5">
    <div v-for="reservation in reservations" v-bind:key="reservation.id" >
    <div class="card m-1" style="width: 18rem;">
      <img src="http://growthinvestmentgroup.com/NoPropertyImg/no-property-image.gif" class="card-img-top" alt="Slika objekta">
      <div class="card-body">
        <h5 class="card-title">ID reservation: {{reservation.id}}</h5>
        <p class="card-text">Reserved from: {{reservation.date_from}}<br>Reservad to:{{reservation.date_to}}
        <br>Total price: <strong> {{reservation.total_price}} kn </strong>
      <br>First name: {{reservation.first_name}}<br>Last name: {{reservation.last_name}}
    <br>Email: {{reservation.email}}</p>
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
          reservations:[],
          reservation: {
            id:'',
            unit_id:'',
            date_from:'',
            date_to: '',
            total_price: '',
            first_name:'',
            last_name: '',
            email: ''
          }
        }
      },
      created(){
        this.fetchUnits();
      },
      methods: {
        fetchUnits(){
          fetch('api/reservation').then(res => res.json()).then(res=>{
            this.reservations = res.data;
          });
        }
      }
    };
</script>
