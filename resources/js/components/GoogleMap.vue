<template>
    <div>
        <gmap-map
                ref="gmap"
                :center="center"
                :zoom="12"
                style="width:100%;  height: 400px;"
        >

            <gmap-marker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    @click="toggleInfoWindow(m,index)">
            </gmap-marker>

            <gmap-info-window
                    :options="infoOptions"
                    :position="infoWindowPos"
                    :opened="infoWinOpen"
                    @closeclick="infoWinOpen=false"
            >
                <div v-html="infoContent"></div>
            </gmap-info-window>

        </gmap-map>
    </div>
</template>

<script>
    export default {
        name: "GoogleMap",
        props: [
            'lat', 'lng', 'desc', 'img'
        ],
        data() {
            return {
                //a default center for the map
                center: {lat: this.lat, lng: this.lng},
                map: null,
                infoContent: '',
                infoWindowPos: {
                    lat: 0,
                    lng: 0
                },
                infoWinOpen: false,
                currentMidx: null,
                //optional: offset infowindow so it visually sits nicely on top of our marker
                infoOptions: {
                    pixelOffset: {
                        width: 0,
                        height: -35
                    }
                },
                markers: [
                    {
                        name: this.desc,
                        description: "",
                        date_build: "",
                        position: {lat: this.lat, lng: this.lng},
                        img: this.img
                    },
                ],
            };
        },
        mounted() {
            //set bounds of the map
            this.$refs.gmap.$mapPromise.then((map) => {
                const bounds = new google.maps.LatLngBounds();
                for (let m of this.markers) {
                    bounds.extend(m.position)
                }
                map.fitBounds(bounds);
            });
            this.geolocation();
        },
        methods: {
            toggleInfoWindow: function (marker, idx) {
                this.infoWindowPos = marker.position;
                this.infoContent = this.getInfoWindowContent(marker);


                //check if its the same marker that was selected if yes toggle
                if (this.currentMidx == idx) {
                    this.infoWinOpen = !this.infoWinOpen;
                }
                //if different marker set infowindow to open and reset current marker index
                else {
                    this.infoWinOpen = true;
                    this.currentMidx = idx;
                }
            },
            geolocation : function() {
                navigator.geolocation.getCurrentPosition((position) => {
                    this.markers.push({
                        name: "You are here",
                        description: "",
                        date_build: "",
                        position: {lat: position.coords.latitude, lng:  position.coords.longitude}
                    });
                });
            },

            getInfoWindowContent: function (marker) {
                let html =
                    `<div class="card">`;
                if(marker.img) {
                    html +=
                     `<div class="card-image">
                        <figure class="image is-4by3">
                          <img src="${marker.img}" width="100px">
                        </figure>
                      </div>`;
                }

                html +=
                 `<div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4 text-dark" >${marker.name}</p>
                      </div>
                    </div>
                  </div>
                 </div>`;

                return html;
            },
        }
    };
</script>