<template>
    <div>
      <Loader v-if="isLoading"/>
              <ul v-else-if="tags.length">
                 <li v-for="elem in tags" :key="elem.id">

                      <router-link :to="`/tags/${elem.name}`">
                      <!-- <router-link :to"'/tags/${elem.id}'"> -->
                          {{ elem.name }}
                      </router-link>

                  </li>
              </ul>
              <p v-else>
                  non ci sono tag da visualizzare
              </p>

              <!-- paginazione -->
              <!-- <Pagination @on-page-change="gettags" :pagination="pagination"/> -->
          </div>
  </template>

  <script>

  import Loader from '../Loader.vue'
  //import Pagination from '../Pagination.vue'

  export default {
      name: 'TagsList',
      // props: ['tags', 'isLoading', 'pagination'],
      components: {
          Loader
          //Pagination
      },
      data(){
          return{
              tags: [],
              isLoading: false
              //pagination: {}
          }
      },
      mounted(){
          this.getTags();
      },
      methods: {
          getTags(){
              this.isLoading = true;
              axios.get('http://localhost:8000/api/tags')
                  .then( (res) => {
                      console.log(res.data);

                      this.tags = res.data;


                  }).catch(err => {
                      console.log(err);
                  }).then(() => {
                      this.isLoading = false;
                      console.log(this.posts)
                  });

          }
      }
  }
  </script>

  <style scooped lang="scss">

  </style>
