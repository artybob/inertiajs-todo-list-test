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
          <div class="flex mt-4">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                   v-model="todo.name" placeholder="Add Todo">
            <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal"
                    @click="addToDo()">Add
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="flex mb-4 items-center" v-for="to_do in to_dos">

      <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
          <template v-if="to_do.status == 'complete'">
            <p class="w-full line-through text-green">{{ to_do.name }}</p>
          </template>
          <template v-else>
            <p class="w-full text-grey">{{ to_do.name }} | <span>{{ to_do.status }}</span></p>
          </template>
          <br>

          <span style="font-size: 12px">{{ to_do.text }}</span>

          <div class="flex mb-2 mt-4 items-center">
            <Link class="flex-no-shrink p-2 ml-2 border-2 rounded text-grey border-grey hover:text-white hover:bg-grey"
                  :href="route('todo.edit', to_do.id)">Edit
            </Link>

            <a class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red"
               href="#" @click="removeToDo(to_do.id)">Remove</a>
          </div>

        </div>
      </div>

    </div>


  </Layout>


</template>

<script>

export default {

  props: ['title', 'to_dos'],
  data() {
    return {
      todo: {name: '', text: 'n', status: 'pending'},
    }
  },
  methods: {
    removeToDo(id) {
      this.$inertia.post(route('todo.remove'), {id: id});
    },
    addToDo() {
      this.$inertia.post(route('todo.add'), {todo: this.todo});
    },
  }
}

</script>

<style scoped>

</style>