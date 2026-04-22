import {ref} from "vue";
import axios from "axios";
import adminApi from "../adminApi.js";

const isAdmin = ref(false)
const isImpairedVision = ref(false)

async function checkAdmin() {
    try {
        const res = await axios.post('/api/auth/me', {}, {
            headers: {
                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
        })
        if (res.status === 200) {
            isAdmin.value = true
        }
    } catch (error){
        if (error.response.status === 401) {
            isAdmin.value = false
        }
    }
}

async function logout() {
    try {
        await adminApi.post('/api/auth/logout')
        isAdmin.value = false
        alert("Вы вышли из режима администратора")
    } catch (error){
        alert("Ошибка")
    }
}

function getImgUrl(url) {
    return new URL(`${url}`, import.meta.url)
}

async function uploadDocument(doc, type, description = null) {
    const formData = new FormData()
    formData.append('document', doc)
    if (description) {
        formData.append('description', description)
    }

    return adminApi.post(`/api/auth/documents/${type}`, formData)
        .then(response => {
            alert('Сохранено')
        })
        .catch(error => alert(error.response.data.message))
}

async function replaceDocument(doc, uuid) {
    const formData = new FormData()
    formData.append('document', doc)

    return adminApi.post(`/api/auth/documents/uuid/${uuid}`, formData)
        .then(response => {
            alert('Сохранено')
        })
        .catch(error => alert(error.response.data.message))
}

async function downloadDocument(name, type) {
    try {
        const response = await axios.get(`/api/documents/${type}`, {
            responseType: 'arraybuffer',
        })

        processDownload(response, name)
    } catch (error) {
        alert('Документ не найден')
    }
}

async function downloadByUuid(uuid, name) {
    try {
        const response = await axios.get(`/api/documents/download/${uuid}`, {
            responseType: 'arraybuffer',
        })

        processDownload(response, name, true)
    } catch (error) {
        alert('Документ не найден')
    }
}

function processDownload(response, name, nameHaveExtension = false) {
    const contentDisposition = response.headers['content-disposition']
    const extension = contentDisposition.split(';')[1].split('=')[1].trim().split('.').pop()
    let fileName = name

    if (!nameHaveExtension) {
        fileName = `${name}.${extension}`
    }

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
}

function documentsScrollUp() {
    window.scrollTo(0, 220)
}

async function fetchDocumentsByType(type) {
    const response = await axios.get(`/api/documents/scope/${type}`)
    return response.data.documents
}

async function fetchDocumentsByUuid(uuid) {
    const response = await axios.get(`/api/documents/uuid/${uuid}`)
    return response.data.document
}

async function deleteDocumentsByUuid(uuid) {
    await adminApi.delete(`/api/auth/documents/uuid/${uuid}`)
        .then(response => {
        })
        .catch(error => alert(error.response.data.message))
}

async function saveDocDescriptionByUuid(uuid, description) {
    await adminApi.patch(`/api/auth/documents/description/${uuid}`, {'description': description})
        .then(() => {
            alert('Сохранено')
        })
        .catch(error => alert(error.response.data.message))
}

async function sendFeedback(payload) {
    return axios.post(`/api/send-feedback`, payload)
        .then(response => {
            alert(response.data.message)
            if (response.status !== 200) {
                return false
            }

            return true
        })
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

async function fetchAvailableContent() {
    return axios.get(`/api/content/available`)
        .then(response => response.data.content)
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

async function updateAvailableContent(payload) {
    return adminApi.put(`/api/auth/content/available`, payload)
        .then(response => {
            alert('Обновлено')
        })
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

async function fetchExperienceContent() {
    return axios.get(`/api/content/experience`)
        .then(response => ({
            content: response.data.content,
            programs_content: response.data.programs_content ?? '',
        }))
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

async function updateExperienceContent(payload) {
    const body = typeof payload === 'string' ? { content: payload } : payload

    return adminApi.put(`/api/auth/content/experience`, body)
        .then(response => {
            alert('Обновлено')
        })
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

async function fetchExperienceTableContent() {
    return axios.get(`/api/content/experience-table`)
        .then(response => response.data.content)
        .catch(error => {
            alert(error.response.data.message)
            return false
        })
}

async function updateExperienceTableContent(payload) {
    return adminApi.put(`/api/auth/content/experience-table`, payload)
        .then(response => {
            alert('Таблица обновлена')
        })
        .catch(error => {
            alert(error.response.data.message)
            return false
        })
}

async function fetchStructureContent() {
    return axios.get(`/api/content/structure`)
        .then(response => response.data.content)
        .catch(error => {
            console.error('Error fetching structure:', error)
            return null
        })
}

async function updateStructureContent(payload) {
    try {
        const response = await adminApi.put(`/api/auth/content/structure`, payload)
        return response?.data?.content || null
    } catch (error) {
        console.error('Error updating structure:', error)
        return null
    }
}

async function fetchContactsContent() {
    return axios.get(`/api/content/contacts-content`)
        .then(response => response.data.content)
        .catch(error => {
            console.error('Error fetching contacts content:', error)
            return false
        })
}

async function updateContactsContent(payload) {
    return adminApi.put(`/api/auth/content/contacts-content`, payload)
        .then(() => {
            alert('Сохранено')
            return true
        })
        .catch(error => {
            alert(error.response?.data?.message ?? 'Ошибка сохранения')
            return false
        })
}

async function fetchStaffPageContent() {
    return axios.get(`/api/content/staff-page`)
        .then(response => ({
            intro_text: response.data.intro_text ?? '',
            director_text: response.data.director_text ?? '',
            roster: Array.isArray(response.data.roster) ? response.data.roster : [],
        }))
        .catch(error => {
            console.error('Error fetching staff page:', error)
            return false
        })
}

async function updateStaffPageContent(payload) {
    return adminApi.put(`/api/auth/content/staff-page`, payload)
        .then(() => {
            alert('Сохранено')
            return true
        })
        .catch(error => {
            alert(error.response?.data?.message ?? 'Ошибка сохранения')
            return false
        })
}

async function fetchSocialServicesPageContent() {
    return axios.get(`/api/content/social-services-page`)
        .then(response => ({
            regulation_text: response.data.regulation_text ?? '',
            round_clock_text: response.data.round_clock_text ?? '',
            center_info_items: Array.isArray(response.data.center_info_items)
                ? response.data.center_info_items
                : [],
        }))
        .catch(error => {
            console.error('Error fetching social services page:', error)
            return false
        })
}

async function updateSocialServicesPageContent(payload) {
    return adminApi.put(`/api/auth/content/social-services-page`, payload)
        .then(() => {
            alert('Сохранено')
            return true
        })
        .catch(error => {
            alert(error.response?.data?.message ?? 'Ошибка сохранения')
            return false
        })
}

async function fetchBoardTrusteesPageContent() {
    return axios.get(`/api/content/board-trustees-page`)
        .then(response => response.data.html)
        .catch(error => {
            console.error('Error fetching board trustees page:', error)
            return false
        })
}

async function updateBoardTrusteesPageContent(html) {
    return adminApi.put(`/api/auth/content/board-trustees-page`, { html })
        .then(() => {
            alert('Обновлено')
        })
        .catch(error => {
            alert(error.response?.data?.message ?? 'Ошибка сохранения')
        })
}

async function fetchAboutDescriptionContent() {
    return axios.get(`/api/content/about-description`)
        .then(response => response.data.html)
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

async function updateAboutDescriptionContent(html) {
    return adminApi.put(`/api/auth/content/about-description`, { html })
        .then(() => {
            alert('Обновлено')
        })
        .catch(error => {
            alert(error.response.data.message)

            return false
        })
}

export default function useCommon() {
    return {
        getImgUrl,
        uploadDocument,
        downloadDocument,
        documentsScrollUp,
        fetchDocumentsByType,
        fetchDocumentsByUuid,
        replaceDocument,
        downloadByUuid,
        deleteDocumentsByUuid,
        saveDocDescriptionByUuid,
        sendFeedback,
        checkAdmin,
        logout,
        fetchAvailableContent,
        updateAvailableContent,
        fetchExperienceContent,
        updateExperienceContent,
        fetchExperienceTableContent,
        updateExperienceTableContent,
        fetchStructureContent,
        updateStructureContent,
        fetchContactsContent,
        updateContactsContent,
        fetchStaffPageContent,
        updateStaffPageContent,
        fetchSocialServicesPageContent,
        updateSocialServicesPageContent,
        fetchBoardTrusteesPageContent,
        updateBoardTrusteesPageContent,
        fetchAboutDescriptionContent,
        updateAboutDescriptionContent,
        isImpairedVision,
        isAdmin,
    }
}

