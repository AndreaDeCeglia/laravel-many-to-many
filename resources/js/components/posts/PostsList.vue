<template>
  <div>
    <Loader v-if="isLoading"/>
            <ul v-else-if="posts.length">
               <li v-for="elem in posts" :key="elem.id">
                    {{ elem.title }}
               </li>
            </ul>
            <p v-else>
                non ci sono post da visualizzare
            </p>

            <!-- paginazione -->
            <Pagination @on-page-change="getPosts" :pagination="pagination"/>
        </div>
</template>

<script>

import Loader from '../Loader.vue'
import Pagination from '../Pagination.vue'

export default {
    name: 'PostsList',
    // props: ['posts', 'isLoading', 'pagination'],
    components: {
        Loader,
        Pagination
    },
    data(){
        return{
            posts: [],
            isLoading: false,
            pagination: {}
        }
    },
    mounted(){
        this.getPosts();
    },
    methods: {
        getPosts(page){
            this.isLoading = true;
            axios.get('http://localhost:8000/api/posts?page=' + page)
                .then( (res) => {
                    console.log(res.data);
                    //this.posts = res.data;
                    //dopo il PAGINATE nel Controller
                    //this.posts = res.data.data;
                    //qua possiamo indicare se lo stato è cambiato o meno


                    // destrutturizzazione
                    const { data, current_page, last_page } = res.data;
                    
                    //const data = res.data.data;
                    //const current_page = res.data.current_page;
                    //const last_page = res.data.last_page;
                    
                    this.posts = data;

                    this.pagination = {
                        lastPage: last_page,
                        currentPage: current_page
                    };



                }).catch(err => {
                    console.log(err);
                }).then(() => {
                    this.isLoading = false;
                });
        
        }
    }
}
</script>

<style scooped lang="scss">

</style>