<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Теги</div>

                    <div class="card-body">
                        

list: {{  list  }}
<br>
resError: {{ resError }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref } from "@vue/reactivity"

import axios from axios

// console.log('Component mounted.')

const list = ref({})
const resError = ref({})

await axios
    .get('/api/tags'
    // , 
    // {
    //   name: name.value,
    //   family: family.value,
    //   email: email.value,
    //   password: password.value,
    //   password_confirmation: password_confirmation.value,
    // }
    )
    // обработка запроса норм, смотрим что получили в ответ
    .then(function (response) {
      // console.log(77,response.response);
      // console.log(7711,response.data.status);
      if (response.data.status === 'success') {
        list.value = response.data
        // window.location.href = '/';
        // resOk.value = true
      }

      // console.log(11, response)
      // console.log(1100, response.response.data.status)
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

</script>
