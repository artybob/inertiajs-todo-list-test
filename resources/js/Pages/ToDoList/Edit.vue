<script setup>
import Layout from '@/Layouts/Layout.vue';
import {Link} from "@inertiajs/vue3";
</script>

<template>
  <Layout>
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
      <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
          <h1 class="text-grey-darkest">{{ title }}</h1>
        </div>
        <div class="mb-4">
          <div class="flex mb-2 items-center">
            <input type="text" v-model="todo.name" class="w-100" placeholder="Название">
          </div>
          <div class="flex mb-2 items-center">
            <input type="text" v-model="todo.text" class="w-100" placeholder="Текст">
          </div>
          <div class="flex mb-2 items-center">
            <input type="text" v-model="todo.status" class="w-100" placeholder="Статус">
          </div>
        </div>

        <a class="flex-no-shrink p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" href="#"
           @click="save()">Save</a>

        <!--        <a class="flex-no-shrink p-2 ml-2 border-2 rounded text-blue border-blue hover:text-white hover:bg-blue" href="#" @click="back()">Back</a>-->
      </div>
    </div>

  </Layout>


</template>

<script>

export default {
  props: ['title', 'to_do'],
  data() {
    return {
      todo: {
        id: this.to_do.id,
        name: this.to_do.name,
        text: this.to_do.text,
        status: this.to_do.status
      },
    }
  },
  methods: {
    save() {
      this.$inertia.post(route('todo.save'), {todo: this.todo});
    },
  }
}

</script>

<style scoped>
.w-100 {
  width: 100%
}
</style>