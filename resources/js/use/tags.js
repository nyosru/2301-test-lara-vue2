import { ref } from '@vue/reactivity'
import { watchEffect } from '@vue/runtime-core'

const list = ref({})
const listMeta = ref({})

const resError = ref({})
const resLoading = ref(true)

// на старте 
const nowPage = ref(1)
const nowPageLoad = ref(0)

const loadData = async(page = 1) => {

    resLoading.value = true

    axios
        .get(
            '/api/tags' + (page > 1 ? '?page=' + page : ''),
        )
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
    }
}