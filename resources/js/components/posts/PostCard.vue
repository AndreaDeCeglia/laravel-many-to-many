<template>
  <div>
    <h1>
        CARD FRONT DEL SINGOLO POST
    </h1>
    {{ post.title }}
    {{ post.body }}
  </div>
</template>

<script>
export default {
    name: 'PostCard',
    components: {
        
    },
    data(){
        return{
            post: null,
        }
    },
    mounted(){
        this.getPost();
    },
    methods: {
        getPost(){
            //this.isLoading = true;
            axios.get('http://localhost:8000/api/posts/' + this.$route.params.id)
                .then( (res) => {
                    console.log(res.data);
                    //this.posts = res.data;
                    //dopo il PAGINATE nel Controller
                    //this.posts = res.data.data;
                    //qua possiamo indicare se lo stato è cambiato o meno


                    // destrutturizzazione
                    //const { data, current_page, last_page } = res.data;
                    
                    //const data = res.data.data;
                    //const current_page = res.data.current_page;
                    //const last_page = res.data.last_page;
                    
                    this.post = res.data;

                    // this.pagination = {
                    //     lastPage: last_page,
                    //     currentPage: current_page
                    // };



                }).catch(err => {
                    console.log(err);
                });
                // }).then(() => {
                //     this.isLoading = false;
                // });
        
        }
    }
}
</script>

<style>

</style>