<script>
  import JetNavLink from '@/Jetstream/NavLink';
  import { Link } from '@inertiajs/inertia-vue3';
  import MainActivity from '@/Layouts/MainActivity';
  import { Inertia } from '@inertiajs/inertia';

  export default {
    components: {
      Link,
      JetNavLink,
      MainActivity
    },

    data(){
      return {
          'test': {
            'id': 0,
            'name':'',
            'grade': 10,
            'subject':'',
            'created_at': '2022-06-02 00:00:01',
            'updated_at': '2022-06-02 00:00:01'
          },
          test_id: 0,
      };
    },
     methods: {
      saveTest(){
        axios.post('/createtest', this.test).then(
          response => {
          }
        ).catch(error => {
            console.log("error");
        })

      },

      back(){
        Inertia.visit(route('tests'))
      }

    },
  };
</script>

<template>
	<MainActivity/>
  <img @click="back" src="/icons/back.svg" class="back-icon m-10" width="20" alt="back">

	 <form class="m-10" @submit.prevent="saveTest()">
    <div class="grid justify-items-center">

    <h3>Create a test</h3>
      <div>
        <!--test-->
        <input class="rounded m-2" type="text" v-model="test.name" placeholder="test name"/>
      </div>
      <div>
        <input class="rounded m-2" type="number" v-model="test.grade" placeholder="test grade"/>
      </div>
      <div>
        <input class="rounded m-2" type="text" v-model="test.subject" placeholder="test subject"/>
      </div>

      <div>
        <button type="submit" class="m-2 bg-rose-200 hover:bg-rose-300 text-white font-bold py-2 px-4 border border-rose-300 rounded">
        submit
      </button>
      </div>

    </div>
  </form>


</template>
