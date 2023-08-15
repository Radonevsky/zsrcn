function getImgUrl(url) {
    return new URL(`${url}`, import.meta.url)
}

export default function useCommon() {
    return {
        getImgUrl,
    }
}

