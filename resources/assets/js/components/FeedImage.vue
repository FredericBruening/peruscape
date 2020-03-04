<template>
    <figure class="image w-full sm:w-1/2 lg:w-1/4 overflow-hidden" v-lazyload @click="showLinks = !showLinks" @mouseover="onMouseOver" @mouseleave="showLinks = false">
        <img class="object-cover w-full h-full" :style="{ width: post.images.standard_resolution.width, height: post.images.standard_resolution.height }" :data-url="post.images.standard_resolution.url">
        <transition name="next">
            <a v-if="showLinks" :href="post.link" class="position absolute inset-0" style="background-color: rgba(0,0,0,.6)">
                <div class="flex items-center justify-center flex-wrap w-full h-full py-2 px-5">
                    <span class="px-2 py-1 bg-gray-700 text-white rounded shadow">{{ post.caption.text }}</span>
                </div>
            </a>
        </transition>
    </figure>
</template>
<script>
    import { throttle } from 'lodash'

    export default {
        props: ['post'],
        data() {
            return {
                showLinks: false
            }
        },
        methods: {
            onMouseOver: throttle(function () {
                this.showLinks = true
            })
        }
    }
</script>
<style lang="scss">
    .next-enter {
        opacity: 0;
        transform: scale3d(2, 0.5, 1) translate3d(400px, 0, 0);
    }

    .next-enter-to {
        transform: scale3d(1, 1, 1);
    }

    .next-enter-active,
    .next-leave-active {
        transition: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .next-leave {
        transform: scale3d(1, 1, 1);
    }

    .next-leave-to {
        opacity: 0;
        transform: scale3d(2, 0.5, 1) translate3d(-400px, 0, 0);
    }

    /* If animations are reduced at the OS level, use simpler transitions */
    @media screen and (prefers-reduced-motion: reduce) {
        .next-enter {
            opacity: 0;
            transform: translate3d(100px, 0, 0);
        }

        .next-enter-active,
        .next-leave-active {
            transition: 0.5s;
        }

        .next-leave-to {
            opacity: 0;
            transform: translate3d(-100px, 0, 0);
        }
    }

    .image {
        position: relative;

        &:hover {
        }

    }
</style>

