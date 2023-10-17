import { ref } from "vue";

export default function useModuleHeartWishlist() {
    const modules = ref([]);
    const heartWishlistCount = ref(0);

    const getModules = async() => {
        let response = await axios.get('/wishlist/index');
            modules.value = response.data.wishlistContent;
            wishlistCount.value = response.data.wishlistCount;        
    }

    const add = async(moduleId) => {

        let response = await axios.post('/wishlist/store', {
            moduleId: moduleId,
        });
        return response.data.count;

    }

    const getCount = async() => {
        let response = await axios.get('/wishlist/count');
        return response.data.count;
    }

    const destroyModule = async(id) => {
        await axios.delete('/wishlist/destroy' + id )
    }

    return {
        add,
        getCount,
        modules,
        getModules,
        destroyModule,
        heartWishlistCount
    }
}