import './bootstrap';
import '../css/app.css';


import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { createApp } from 'vue'; 
import AddToCart from './Components/AddToCart.vue';
import ButtonAddToCart from './Components/ButtonAddToCart.vue';
import ListBtnAddToCart from './Components/ListBtnAddToCart.vue';
import AddToWishlist from './Components/AddToWishlist.vue';
import HeartToWishlist from './Components/HeartToWishlist.vue';
import NavbarCart from './Components/NavbarCart.vue';
import ShoppingCart from './Components/ShoppingCart.vue';
import NavbarWishlist from './Components/NavbarWishlist.vue';
import CartSidebar from './Components/CartSidebar.vue';
import StripeCheckout from './Components/StripeCheckout.vue';
import Wishlist from './Components/Wishlist.vue';
import TrashButton from './Components/TrashButton.vue';
import CartButton from './Components/CartButton.vue';
import Contact from './Components/Contact.vue';
import Toaster from '@meforma/vue-toaster';




const app = createApp();

app.use(Toaster);

app.component('AddToCart', AddToCart);
app.component('ButtonAddToCart', ButtonAddToCart);
app.component('ListBtnAddToCart', ListBtnAddToCart);
app.component('AddToWishlist', AddToWishlist);
app.component('HeartToWishlist', HeartToWishlist);
app.component('NavbarCart', NavbarCart)
app.component('ShoppingCart', ShoppingCart);
app.component('NavbarWishlist', NavbarWishlist);
app.component('CartSidebar', CartSidebar);
app.component('StripeCheckout', StripeCheckout);
app.component('Wishlist', Wishlist);
app.component('TrashButton', TrashButton);
app.component('CartButton', CartButton);
app.component('Contact', Contact);

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

/*** 
 * 
 * Start: Change product description tabs.
 * 
 * ***/


    // Get all tab links and tab contents
            // Get all tab links and tab contents
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');
            const tabSelect = document.getElementById('tabSelect');

            if (tabSelect) {
              tabSelect.addEventListener('change', () => {
                const targetTab = tabSelect.value;
                tabContents.forEach(content => {
                  content.classList.remove('active');
                  content.classList.add('hidden');
                });
                const activeTabContent = document.querySelector(`[data-tab-content="${targetTab}"]`);
                activeTabContent.classList.add('active');
                activeTabContent.classList.remove('hidden');
              })
            }

            // Add click event listeners to tab links
            tabLinks.forEach(link => {
              link.addEventListener('click', () => {
                // Get the data-tab attribute value of the clicked link
                const targetTab = link.dataset.tab;

                // Hide all tab contents
                tabContents.forEach(content => {
                  content.classList.remove('active');
                  content.classList.add('hidden');
                });

                // Show the corresponding tab content
                const activeTabContent = document.querySelector(`[data-tab-content="${targetTab}"]`);
                activeTabContent.classList.add('active');
                activeTabContent.classList.remove('hidden');

                
              });
            });


/*** 
 * 
 * End : Change product description tabs.
 * 
 * ***/

/*** 
 * 
 * Start: Change view of products in index from grid to list view.
 * 
 * ***/

const btnGrid = document.getElementById('gridBtn');
const btnList = document.getElementById('listBtn');
const gridPanel = document.getElementById('gridPanel');
const listPanel = document.getElementById('listPanel');

btnGrid.onclick = function() {
  gridPanel.classList.add('active');
  gridPanel.classList.remove('hidden');
  listPanel.classList.add('hidden');
  listPanel.classList.remove('active');
}

btnList.onclick = function() {
  listPanel.classList.add('active');
  listPanel.classList.remove('hidden');
  gridPanel.classList.add('hidden');
  gridPanel.classList.remove('active');
}

/*** 
 * 
 * End: Change view of products in index from grid to list view.
 * 
 * ***/

window.onload = function viewPassword()
  {
    const inputPassword = document.getElementById('password');
    const inputPassword_repetition = document.getElementById('password_confirmation');
    if(inputPassword.type == "password")
    {
      inputPassword.type = "text";
      inputPassword_repetition.type = "text";
      document.getElementById('eye-close').style.display="block";
      document.getElementById('eye-open').style.display="none";

    }
    else{
      inputPassword.type = "password";
      inputPassword_repetition.type = "password";
      document.getElementById('eye-close').style.display="none";
      document.getElementById('eye-open').style.display="block";
    }
  }



