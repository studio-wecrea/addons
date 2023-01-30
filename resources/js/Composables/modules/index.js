import { ref } from "vue";

export default function useModule() {
    const modules = ref([]);
    const platforms = ref([]);

    const getModules = async() => {
        let response = await axios.get('/cart/index');
            modules.value = response.data.cartContent;
            
        
    }
    const getPlatforms = async() => {
        let response = await axios.get('/cart/index');
        platforms.value = response.data.cartContent;
            
        
    }

    const add = async(moduleId) => {

        let response = await axios.post('/cart/store', {
            moduleId: moduleId,
            platformId: platformId
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
        platforms,
        getModules,
        getPlatforms,
        destroyModule
    }
}