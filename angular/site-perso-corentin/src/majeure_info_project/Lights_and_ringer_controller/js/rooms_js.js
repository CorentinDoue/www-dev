var app = new Vue({
  el: '#app',
  data: {
    rooms: [],
    newRoomForm: false,
    newRoom:{}
  },
  methods: {
    getrooms: function () {
      axios.get('https://secret-chamber-54105.herokuapp.com/api/rooms')
      .then(function (response) {
        app.rooms=response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    switch_light: function(id){
      var j=0;
      for (var i = 0; i < app.rooms.length; i++) {
        if(app.rooms[i].id==id){
          j=i;
        }
      }
      axios.post('https://secret-chamber-54105.herokuapp.com/api/rooms/'+id+'/switch-light')
      .then(function (response) {
        app.rooms[j].light=response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    switch_noise: function(id){
      var j=0;
      for (var i = 0; i < app.rooms.length; i++) {
        if(app.rooms[i].id==id){
          j=i;
        }
      }
      axios.post('https://secret-chamber-54105.herokuapp.com/api/rooms/'+id+'/switch-noise')
      .then(function (response) {
        app.rooms[j].noise=response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    initNewRoom: function(){
      var maxRoom=0;
      var maxLight=0;
      var maxNoise=0;
      for (var i = 0; i < app.rooms.length; i++) {
        if(app.rooms[i].id>maxRoom){
          maxRoom=app.rooms[i].id;
        }
        if(app.rooms[i].light.id>maxLight){
          maxLight=app.rooms[i].light.id;
        }
        if(app.rooms[i].id>maxNoise){
          maxNoise=app.rooms[i].noise.id;
        }
      }
      this.newRoom.id=maxRoom+1;
      Vue.set(app.newRoom, 'light', {});
      Vue.set(app.newRoom.light, 'id', maxLight+1);
      Vue.set(app.newRoom.light, 'status', "ON");
      Vue.set(app.newRoom.light, 'level', 10);

      Vue.set(app.newRoom, 'noise', {});
      Vue.set(app.newRoom.noise, 'id', maxNoise+1);
      Vue.set(app.newRoom.noise, 'status', "ON");
      Vue.set(app.newRoom.noise, 'level', 10);
      Vue.set(app.newRoom, 'name', "new name");

      this.newRoomForm=true;
    },
    sendNewRoom: function(){
      axios({
        method: 'post',
        url: 'https://secret-chamber-54105.herokuapp.com/api/rooms/new',
        data: app.newRoom
      })
        .then(function(response) {
          app.rooms.push(app.newRoom);
          app.newRoomForm=false;
      });
    },
    delete_room: function(id){
      if (confirm("Would you realy delete the room "+id+" ?")) {
        var j=0;
        for (var i = 0; i < app.rooms.length; i++) {
          if(app.rooms[i].id==id){
            j=i;
          }
        }
        axios.post('https://secret-chamber-54105.herokuapp.com/api/rooms/'+id+'/delete')
        .then(function (response) {
          app.rooms.splice(j,1);
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    }
  },
  mounted: function (){
    this.getrooms();
  }
})
