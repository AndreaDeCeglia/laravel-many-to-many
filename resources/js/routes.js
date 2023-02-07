//questo lo si crea dopo
//  npm i vue-router@3 //
//da terminale

//si gestiscono le rotte front
// il WEB.PHP del FRONT

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//dopo importo ed utilizzo

//import componenti che fungono da pagine
import AboutUs from './views/pages/AboutUs.vue'
import PostsIndex from './views/pages/posts/PostsIndex.vue'
import HomePage from './views/pages/HomePage.vue'
import PostShow from './views/pages/posts/PostShow.vue'
import TagsIndex from './views/pages/tags/TagsIndex.vue'
import TagShow from './views/pages/tags/TagShow.vue'

const router = new VueRouter({
    //istanzio il Router e lo abbino alla varibile
    //qua scrivo i Path per le pagine

    // tiene memoria delle rotte, "collegandosi"
    //alle frecce <- -> , visto che siamo
    //in una SinglPageApplication
    mode: 'history',

    routes: [
        {
            path: '/',
            name: '/',
            component: HomePage
        },
        {
            path: '/about-us',
            name: 'about-us',
            component: AboutUs
        },
        {
            //localhost:8000/posts
            path: '/posts',
            name: 'posts',
            component: PostsIndex
        },
        {
            path: '/posts/:id',
            name: 'singlePost',
            component: PostShow
        },
        {
            path: '/tags',
            name: 'tags',
            component: TagsIndex
        },
        {
            path: '/tags/:name',
            name: 'singleTag',
            component: TagShow
        }
    ]
});

// esporto in App.js
export default router;
