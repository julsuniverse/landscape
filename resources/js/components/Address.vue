<template>
    <p><b>{{ address }}</b></p>
</template>

<script>
    export default {
        name: "Address",
        props: [
            'lat', 'lng',
        ],
        data() {
            return {
                address: null
            };
        },
        created () {
            Vue.$geocoder.setDefaultMode('lat-lng');
            var latLngObj = {
                lat: this.lat,
                lng: this.lng
            };
            Vue.$geocoder.send(latLngObj, response => {
                this.address = response.results[0].formatted_address;
                console.log('address', this.address);
            });
        }
    }
</script>