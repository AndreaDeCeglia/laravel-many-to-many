<template>
  <div>
    <h1>
        pagina dei tags
    </h1>
    <!-- comp lista tags -->
    <TagsList/>

  </div>
</template>

<script>
import TagsList from '../../../components/tags/TagsList.vue'

export default {
    name: 'TagsIndex',
    components: {
        TagsList
    }
}
</script>

<style>

</style>
