import { ref } from '@vue/reactivity'
import { watchEffect } from '@vue/runtime-core'

const list = ref({})
const listMeta = ref({})

const resError = ref({})
const resErrorStr = ref('')
const resLoading = ref(true)

// добавление
const addResult = ref(false)
const addError = ref({})
const addErrorStr = ref('')
const addLoading = ref(false)

const formTagTitle = ref('')

// на старте
const nowPage = ref(1)
const nowPageLoad = ref(0)

const addData = async(item) => {
    addResult.value = false
    addLoading.value = true
    addError.value = {}
    addErrorStr.value = ''

    axios
        .post('/api/tags', { title: formTagTitle.value })
        // обработка запроса норм, смотрим что получили в ответ
        .then(function(response) {
            addResult.value = true
            loadData(nowPage.value)
            formTagTitle.value = ''
                // nowPage.value = page
                // list.value = response.data.data
                // listMeta.value = response.data.meta
        })
        // обработка запроса прошла неудачно
        .catch((error) => {
            // ошибка валиадции
            if (error.response.status === 422) {
                addError.value = error.response.data.errors
            }
            // каккая то другая ошибка
            else {
                // упс ... а вот и ошибка
                addError.value = error
                addErrorStr.value =
                    'упс ... произошла неописуемая ситуация, повторитее попытку через пару минут'
            }
        })
        .finally((re) => {
            // загрузка закончена
            addLoading.value = false
        })
}

// удаление

const itemDelete = async(id) => {
    axios
        .delete('/api/tags/' + id)
        // обработка запроса норм, смотрим что получили в ответ
        .then(function(response) {
            loadData(nowPage.value)
        })
        // обработка запроса прошла неудачно
        .catch((error) => {
            alert(
                'упс ... произошла неописуемая ситуация, повторитее попытку через пару минут',
            )
        })
}

const loadData = async(page = 1) => {
    resLoading.value = true

    axios
        .get('/api/tags' + (page > 1 ? '?page=' + page : ''))
        // обработка запроса норм, смотрим что получили в ответ
        .then(function(response) {
            nowPage.value = page
            list.value = response.data.data
            listMeta.value = response.data.meta
        })
        // обработка запроса прошла неудачно
        .catch((error) => {
            // ошибка валиадции
            if (error.response.status === 422) {
                resError.value = error.response.data.errors
            }
            // каккая то другая ошибка
            else {
                // упс ... а вот и ошибка
                resError.value = error
                resErrorStr.value =
                    'упс ... произошла неописуемая ситуация, повторитее попытку через пару минут'
            }
        })
        .finally((re) => {
            // загрузка закончена
            resLoading.value = false
        })
}

const dataAll = ref({})
const dataAllLoading = ref(false)

const loadDataAll = async() => {

    dataAllLoading.value = true

    axios
        .get('/api/tags/all')
        // обработка запроса норм, смотрим что получили в ответ
        .then(function(response) {
            dataAll.value = response.data.data
        })
        // обработка запроса прошла неудачно
        .catch((error) => {
            // // ошибка валиадции
            // if (error.response.status === 422) {
            //     resError.value = error.response.data.errors
            // }
            // // каккая то другая ошибка
            // else {
            //     // упс ... а вот и ошибка
            //     resError.value = error
            //     resErrorStr.value =
            //         'упс ... произошла неописуемая ситуация, повторитее попытку через пару минут'
            // }
        })
        // загрузка закончена
        .finally((re) => {
            dataAllLoading.value = false
        })
}

// грузим на старте и при изменениях номера страницы
watchEffect(() => {
    loadData(nowPage.value)
})

export default function tags() {
    return {
        loadData,
        list,
        listMeta,
        resError,
        resLoading,
        nowPage,
        nowPageLoad,

        // добавление
        formTagTitle,
        addData,
        addResult,
        addLoading,
        addError,
        addErrorStr,
        // удаление
        itemDelete,
        // полный список
        loadDataAll,
        dataAll,
        dataAllLoading,

    }
}