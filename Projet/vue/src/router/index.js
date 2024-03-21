import { createRouter, createWebHistory } from "vue-router";
import Dashboard from '../views/Dashboard.vue';
import Classement from '../views/Classement.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import DefaultLayout from '../components/DefaultLayout.vue';
import store from '../store/index1.js';
import AuthLayout from '../components/AuthLayout.vue';
import Amis from '../views/Amis.vue';
import Partie from '../views/Partie.vue';


const routes = [
    {
        path: '/',
        redirect:'/dashboard',
        component: DefaultLayout,
        children: [
          {path: '/dashboard', name:'Dashboard', component: Dashboard},
          {path: '/classement', name:'Classement', component: Classement},
          {path: '/partie', name:'Partie', component: Partie},
          {path: '/amis', name:'Amis', component: Amis},
        ]



    },
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        children: [
            {
                path: '/login',
                name: 'Login',
                component: Login,
            },
            {
                path: '/register',
                name: 'Register',
                component: Register,
            },
        ]
    }

]








const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) =>{
    if(to.meta.requiresAuth && !store.state.user.token){
        next({name: 'Login'});
    }
    else if(store.state.user.token && (to.name === 'Login' || to.name === 'Register')){
        next({name: 'Dashboard'});
    }
    else{
        next();
    }
})


export default router;
