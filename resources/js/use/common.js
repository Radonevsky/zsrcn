import {ref} from "vue";

const isAdmin = ref(true)

function getImgUrl(url) {
    return new URL(`${url}`, import.meta.url)
}

async function uploadDocument(doc, type) {
    const formData = new FormData()
    formData.append('document', doc)

    return axios.post(`/api/documents/${type}`, formData)
        .then(response => {
            alert(response.data.message)
        })
        .catch(error => alert(error.response.data.message))
}

async function downloadDocument(name, type) {
    try {
        const response = await axios.get(`/api/documents/${type}`, {
            responseType: 'arraybuffer',
        })

        const contentDisposition = response.headers['content-disposition']
        const extension = contentDisposition.split(';')[1].split('=')[1].trim().split('.').pop()
        const fileName = `${name}.${extension}`

        if (extension === 'pdf') {
            const blob = new Blob([response.data], { type: 'application/pdf' })
            const blobUrl = window.URL.createObjectURL(blob)
            window.open(blobUrl, '_blank')

            return
        }

        const blobUrl = window.URL.createObjectURL(new Blob([response.data]))

        const link = document.createElement('a')
        link.href = blobUrl
        link.setAttribute('download', fileName)

        document.body.appendChild(link)
        link.click()

        document.body.removeChild(link)
    } catch (error) {
        alert('Документ не найден')
    }
}

function documentsScrollUp() {
    window.scrollTo(0, 420)
}

export default function useCommon() {
    return {
        getImgUrl,
        uploadDocument,
        downloadDocument,
        documentsScrollUp,
        isAdmin,
    }
}

