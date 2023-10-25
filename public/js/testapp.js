

window.onload = function () { // element not found issue resloved by window onload

    new Vue({
        el: '#app2',
        data() {
            return {
                child_a:'',
                child_b:'',
            }
        },
    })


    Vue.component('child-a',{
        data(){
            return  {
                child_a:''
            }
        },
        created(){
            console.log('Iam in child a');
        }
      })

      Vue.component('child-b',{
        data(){
            return  {
                child_b:''
            }
        },
        beforeUpdate(){
            console.log('updated a here');
        }
      })




    new Vue({
        el: '#app',
        data() {
            return {
                project_name:'',
                project_description:'',
                skills:[],
                error:{},
                localTime:''
            }
        },
        // data:{
        //     form: new Form({
        //         name:'',
        //         description:''
        //     }),
        //     errors:new Errors()
        // },
        metaInfo() {
            return {
                title: this.localTime,
            };
        },
       mounted() {
            axios.get('/projects/view')
            .then(response => this.skills= response.data);

            this.showLocaleTime();
       },
       methods:{

        onSubmit(){
            // alert('submit');
            // console.log(this.$data);
            axios.post('/projects', { name :this.project_name, description : this.project_description});
            this.project_name ='';
            this.project_description ='';
            axios.get('/projects/view')
            .then(
                response => {
                    this.skills= response.data;
                    // next();
                    //setInterval(greetings, 20000);
                })
            // .catch(error => {
            //     console.log(error);

            // })
        },
        showLocaleTime: function () {
            var time = this;
            setInterval(function () {
             time.localTime = new Date().toLocaleTimeString();
          }, 1000);
         },



       },

     beforeCreated:function(){
        console.log('beforeCreated');
     },
     created:function(){
        console.log('created');
     },
     beforeMount:function(){
        console.log('beforeMount');
     },
     mount:function(){
        console.log('Mount');
     },
     mounted () {
        console.log('Mounted');
     },
     updated:function(){
        console.log('Upadate');
     },
     beforeUpdate:function(){
        console.log('beforeUpdate');
     },
     beforeDestroy:function(){
        console.log('beforeDestroy');
     }
    // ,
    //    mounted () {
    //     this.showLocaleTime()
    //    }

    })

    }

function greetings() {
    console.log('Good Morning!');
  }

//   const successCallback = (position) => {
//     console.log(position);
//   };

//   const errorCallback = (error) => {
//     console.log(error);
//   };

//   navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 6,
  });
  infoWindow = new google.maps.InfoWindow();

  const locationButton = document.createElement("button");

  locationButton.textContent = "Pan to Current Location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        },
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation.",
  );
  infoWindow.open(map);
}

window.initMap = initMap;
