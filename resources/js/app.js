import './bootstrap';
import '../css/app.css';


import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { createApp } from 'vue'; 
import AddToCart from './Components/AddToCart.vue';
import NavbarCart from './Components/NavbarCart.vue';
import ShoppingCart from './Components/ShoppingCart.vue';
import CartSidebar from './Components/CartSidebar.vue';
import StripeCheckout from './Components/StripeCheckout.vue';
import Toaster from '@meforma/vue-toaster';




const app = createApp();

app.use(Toaster);

app.component('AddToCart', AddToCart);
app.component('NavbarCart', NavbarCart);
app.component('ShoppingCart', ShoppingCart);
app.component('CartSidebar', CartSidebar);
app.component('StripeCheckout', StripeCheckout);

app.mount('#app');

// import Vue from 'vue';
// import VueRouter from 'vue-router';
// import VueX from 'vuex';

// Vue.use(VueX);
// Vue.use(VueRouter);

// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path:'/',
//             name: 'welcome',
//             component: () => import('./components/Modules/Index.Vue')
//         },
//         {
//             path: '/module/:slug',
//             name: 'modules.show',
//             component: () => import('./components/Modules/Show.vue')
//         },
//         {
//             path: '/modules/cart',
//             name: 'modules.cart',
//             component: () => import('./components/Modules/Cart.vue')
//         },

//     ]
// });

// const store = new VueX.Store({
//     state: {
//         cart: [],
//         modules: []
//     },

//     mutations: {
//         setModules(state, modules){
//             state.modules = modules;
//         },

//         addModuleToCart(state, module){

//             const duplicatedModuleIndex  = state.cart.findIndex(item => item.id === module.id);

//             if (duplicatedModuleIndex != -1) {
//                 state.cart[duplicatedModuleIndex].qty++;
//                 return;
//             }

//             module.qty = 1;
//             state.cart.push(module);
//         },

//         removeModuletoCart(state, index) {
//             state.cart.splice(index, 1);
//         },
//     },

    
// });

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//     setup({ el, app, props, plugin }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .use(ZiggyVue, Ziggy)
//             .mount(el);
//     },
// });

// InertiaProgress.init({ color: '#4B5563' });
