import {ref} from "vue";

function getImgUrl(url) {
    return new URL(`${url}`, import.meta.url)
}

const isAdmin = ref(true)

export default function useCommon() {
    return {
        getImgUrl,
        isAdmin,
    }
}

