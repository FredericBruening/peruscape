<template>
    <div>
        <div v-if="response.length" class="flex flex-wrap w-full">
            <feed-image :post="post" v-for="post in response" :key="post.id"></feed-image>
        </div>
        <div v-else>
            <span>Something is not right here</span>
        </div>
    </div>
</template>
<script>
    import FeedImage from "./FeedImage";

    export default {
        props: [],
        data() {
            return {
                response: [],
            }
        },
        created() {
            axios.get('/api/instagram')
                 .then(({ data }) => this.response = data)
        },
        components: { FeedImage }
    }
</script>
