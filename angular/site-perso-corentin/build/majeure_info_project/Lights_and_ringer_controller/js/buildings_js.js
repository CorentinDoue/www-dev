var app = new Vue({
  el: '#app',
  data: {
    buildings: []
  },
  methods: {
    getbuildings: function () {
      axios.get('https://secret-chamber-54105.herokuapp.com/api/buildings')
      //axios.get('http://localhost:8080/api/buildings')
      .then(function (response) {
        app.buildings=response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  },
  mounted: function (){
    this.getbuildings();
  }
})
