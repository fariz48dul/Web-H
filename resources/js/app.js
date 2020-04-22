// app.js
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueMeta from 'vue-meta'
Vue.use(VueMeta)


import WelcomeAdmin from './components/WelcomeAdmin'
import Menuadmin from './components/Menuadmin'

import CreatePost from './components/CreatePost'
import AllPosts from './components/AllPosts'
import EditPost from './components/EditPost'

import CreateCategory from './components/CreateCategory'
import AllCategories from './components/AllCategories'
import EditCategory from './components/EditCategory'

import HomepagePosts from './components/HomepagePosts'
import ReadPost from './components/ReadPost'

import About from './components/About'
import Slider from './components/Slider'

import Profile from './components/Profile'


const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'homepageposts',
            component: HomepagePosts,
            props: true,
        },

        {
            path: '/read/:slug',
            name: 'readpost',
            component: ReadPost,
            props: true,
        },

        {
            path: '/admin/dashboard',
            name: 'dashboard',
            component: WelcomeAdmin,
        },

        {
            path: '/admin/post/createpost',
            name: 'createpost',
            component: CreatePost,
            props: true,
        },

        {
            path: '/admin/post/allposts',
            name: 'allposts',
            component: AllPosts,
            props: true,
        },

        {
            path: '/admin/post/editpost/:postId/edit',
            name: 'editpost',
            component: EditPost,
            props: true,
        },

        {
            path: '/admin/category/createcategory',
            name: 'createcategory',
            component: CreateCategory,
            props: true,
        },

        {
            path: '/admin/category/allcategories',
            name: 'allcategories',
            component: AllCategories,
            props: true,
        },

        {
            path: '/admin/category/editcategory/:categoryId/edit',
            name: 'editcategory',
            component: EditCategory,
            props: true,
        },

        {
            path: '/admin/setting/about',
            name: 'about',
            component: About,
            props: true,
        },

        {
            path: '/admin/setting/slider',
            name: 'slider',
            component: Slider,
            props: true,
        },

        {
            path: '/admin/profile',
            name: 'profile',
            component: Profile,
            props: true,
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    components: {
        Menuadmin
    },

});