<template>
    <div class="container">
        <!-- <WorkInProgress/> -->

        <!-- scrivere i dati dei post -->
        <!-- <PostsList :posts="posts" :isLoading="isLoading" :pagination="pagination"/> -->
        <PostsList/>
    </div>
</template>

<script>

import WorkInProgress from "../components/WorkInProgress"
import PostsList from '../components/posts/PostsList.vue'

export default {
    name: "App",
    components: {
        //qui inseriremo i futuri componenti
        WorkInProgress,
        PostsList
    },
    // data(){
    //     return{
    //         posts: [],
    //         isLoading: false,
    //         pagination: {}
    //     }
    // },
    // mounted(){
    //     this.getPosts();
    // },
    //methods: {
        // getPosts(page){
        //     this.isLoading = true;
        //     axios.get('http://localhost:8000/api/posts' + page)
        //         .then( (res) => {
        //             console.log(res.data);
        //             //this.posts = res.data;
        //             //dopo il PAGINATE nel Controller
        //             //this.posts = res.data.data;
        //             //qua possiamo indicare se lo stato è cambiato o meno


        //             // destrutturizzazione
        //             const { data, current_page, last_page } = res.data;
                    
        //             //const data = res.data.data;
        //             //const current_page = res.data.current_page;
        //             //const last_page = res.data.last_page;
                    
        //             this.posts = data;

        //             this.pagination = {
        //                 lastPage: last_page,
        //                 currentPage: current_page
        //             }



        //         }).catch(err => {
        //             console.log(err);
        //         }).then(() => {
        //             this.isLoading = false;
        //         })
        
        // }
    //}
}

</script>