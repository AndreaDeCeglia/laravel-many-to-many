<template>
    <div class="container">
        <!-- <WorkInProgress/> -->

        <!-- HEADER NAVIGAZIONE -->
        <Header/>

        <!-- scrivere i dati dei post -->
        <!-- <PostsList :posts="posts" :isLoading="isLoading" :pagination="pagination"/> -->
        <!-- <PostsList/> -->

        <router-view></router-view>
        <!-- non c'è bisogno di importazione
        ci fa usare il ROUTER
        e ci innesta il codice nel TAG
        simile allo @YIELD di LARAVEL -->
    </div>
</template>

<script>

//import WorkInProgress from "../components/WorkInProgress"
import PostsList from '../components/posts/PostsList.vue'
import Header from '../components/Header.vue'

export default {
    name: "App",
    components: {
        //qui inseriremo i futuri componenti
        //WorkInProgress,
        PostsList,
        Header
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