<template>
  <div>
    <h1>
        pagina del singolo post
    </h1>
    <!-- comp PostCard -->
    <PostCard/>
  </div>
</template>

<script>
import PostCard from '../../../components/posts/PostCard.vue'

export default {
    name: 'PostShow',
    components: {
        PostCard
    },
    data(){
        return{

        }
    },
    methods: {
        
    }
}
</script>

<style>

</style>