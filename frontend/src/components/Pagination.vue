<script>
    import { range } from 'lodash'

    export default {

        props: ['source'],

        data() {
            return {
                pages: []
            }
        },

        methods: {
            navigate(ev, page) {
                ev.preventDefault()
                this.$emit('navigate', page)
            }
        },

        watch: {

            source() {
                this.pages = range(1, this.source.last_page+1)
            }

        }
    }
</script>
<template>
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li v-for="(page, index) in pages" :key="index" :class="{active: source.current_page == page}" class="page-item">
            <a class="page-link" href="#" @click="navigate($event, page)"> {{ page }} </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    </nav>
</template>
