import { ref } from "vue";

export default function useModule() {
    const modules = ref([]);
    const cartCount = ref(0);

    const getModules = async() => {
        let response = await axios.get('/cart/index');
            modules.value = response.data.cartContent;
            cartCount.value = response.data.cartCount;        
    }

    const add = async(moduleId) => {

        let response = await axios.post('/cart/store', {
            moduleId: moduleId,
        });
        return response.data.count;

    }

    const getCount = async() => {
        let response = await axios.get('/cart/count');
        return response.data.count;
    }

    const destroyModule = async(id) => {
        await axios.delete('/cart/destroy' + id )
    }

    return {
        add,
        getCount,
        modules,
        getModules,
        destroyModule,
        cartCount
    }
}