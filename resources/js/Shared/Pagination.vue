<template>
    <div
        class="
        px-5
        py-5
        bg-white
        border-t
        flex flex-col
        xs:flex-row
        items-center
        xs:justify-between
        "
    >
        <span class="text-xs xs:text-sm text-gray-900">
        Showing {{laravelPagination.from}} to {{laravelPagination.to}} of {{laravelPagination.total}} Entries
        </span>
        <div class="inline-flex mt-2 xs:mt-0">
        <!-- <button
                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                        Prev
                    </button>
                    <button
                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                        Next
                    </button> -->
        <Component
            v-for="(link, index) in laravelPagination.links"
            :is="(link.url && !link.active) ? 'Link' : 'span'"
            :class="link.url ? 'mx-2 text-sm ' + (link.active == true ? 'border-b-4 border-indigo-500 bg-white-300 hover:bg-white-400 text-blue-800 ' : 'bg-gray-300 hover:bg-gray-400 text-gray-800 ') + 'font-semibold py-2 px-4 rounded-l ' : 'text-gray-500'"
            :key="index"
            :href="link.url"
            v-html="link.label"
        />
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
    name: 'Pagination',
    components: { Link },
    props: {
        laravelPagination: Object
    }
}
</script>

<style>

</style>