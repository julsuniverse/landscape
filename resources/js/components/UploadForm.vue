<template>
    <div class="hello">
        <form method="POST" :action="action" ref="form">
            <picture-input
                    ref="pictureInput"
                    width="300" height="300" margin="16"
                    accept="image/jpeg,image/png"
                    name="photo"
                    button-class="btn"
                    :hideChangeButton=true
                    :custom-strings="{
              upload: '<h1>Bummer!</h1>',
              drag: 'Upload Your Photo'
            }"
                    @change="onChange">
            </picture-input>
            <br/>
            <div class="text-center" v-if="image">
                <p class="lead">
                    <button
                            class="btn btn-lg btn-secondary"
                            @click.prevent.stop="find()"
                    >
                        Find it!
                    </button>
                </p>

            </div>
        </form>
    </div>
</template>

<script>
    import PictureInput from 'vue-picture-input'
    export default {
        props: [
            'action'
        ],
        data () {
            return {
                image: false
            }
        },
        components: {
            PictureInput
        },
        methods: {
            find() {
                $('#spinner').show();
                axios({
                    method: 'POST',
                    url: this.action,
                    data: new FormData(this.$refs.form)
                })
                    .then(response => {
                        window.location.href = response.data;
                        $('#spinner').hide();
                    })
                    .catch(response => {
                        $('#spinner').hide();
                        alert('Something went wrong');
                    })
            },
            onChange (image) {
                if (!image) {
                    console.log('FileReader API not supported: use the <form>, Luke!')
                }
                this.image = true;
            }
        }
    }
</script>