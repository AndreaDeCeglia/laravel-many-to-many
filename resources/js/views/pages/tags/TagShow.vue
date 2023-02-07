<template>
  <div>
    <h1>
        Pagina di dettaglio del Tag: {{ this.$route.params.name }}
    </h1>
    <!-- Comp TagCard -->
    <TagCard/>
  </div>
</template>

<script>
import TagCard from '../../../components/tags/TagCard.vue'

export default {
    name: 'TagShow',
    components: {
        TagCard
    }
}
</script>

<style>

</style>
