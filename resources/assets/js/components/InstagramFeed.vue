<template>
    <div class="hero is-dark is-boldr">
        <div class="hero-body"
             v-for="post in response" v-if="response">
            <div class="card">
                <div class="card-header background-image"
                     :style="background(post.images.standard_resolution)">
                </div>
                <div class="card-content">
                    <p v-text="post.caption.text"></p>
                </div>
                <div class="card-footer">
                    <div class="card-footer-item">
                        <a :href="post.link">
                            <b-icon icon="link"></b-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <b-icon icon="frown"></b-icon>
            <span>Something is not right here</span>
        </div>
    </div>
</template>
<script type="text/babel">
    export default {
        props:      [],
        data() {
            return {
                response: ''
            }
        },
        created() {
            axios.get('/api/instagram')
                    .then(( { data } )=> this.response = data)
                    .catch(() => {

                    })
        },
        components: {},
        methods:    {
            background( image ) {
                let h = `${image.height}px`
                return {
                    backgroundImage: 'url("' + image.url + '")',
                    zIndex:          '1',
                    minHeight:       h,
                    backgroundRepeat: 'no-repeat',
                    backgroundSize: 'cover'
                }
            }
        }
    }
</script>
<style lang="scss">

</style>
