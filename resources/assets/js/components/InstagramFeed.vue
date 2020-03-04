<template>
    <div>
        <div v-if="response.length" class="flex flex-wrap w-full">
            <figure class="image w-full sm:w-1/2 lg:w-1/4" v-lazyload v-for="post in response">
                <img class="object-cover w-full h-full" :data-url="post.images.standard_resolution.url">
            </figure>
        </div>
        <div v-else>
            <span>Something is not right here</span>
        </div>
    </div>
</template>
<script>
    export default {
        props: [],
        data() {
            return {
                response: []
            }
        },
        created() {
            axios.get('/api/instagram')
                 .then(({ data }) => this.response = data)
                 .catch(() => {

                 })
        },
        components: {},
        methods: {
            background(image) {
                let h = `${image.height}px`
                return {
                    backgroundImage: 'url("' + image.url + '")',
                    zIndex: '1',
                    minHeight: h,
                    backgroundRepeat: 'no-repeat',
                    backgroundSize: 'fit'
                }
            }
        }
    }
</script>
<style lang="scss">
    .image {
        filter: blur(4px);
        transition: 0.5s ease-in-out;

        &:hover {
            filter: blur(0);
            transition: 0.5s ease-in-out;
        }
    }
</style>
