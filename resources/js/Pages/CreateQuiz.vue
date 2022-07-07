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
      	tests: [],
        'quiz': {
          'test_question': {
            'id': 0,
            'name':'',
            'test_id': '',
          },
          'answer1': {
            'id': 0,
            'name':'',
            'test_question_id': 5,
            'is_correct': 0,

          },

          'answer2': {
            'id': 0,
            'name':'',
            'test_question_id': 5,
            'is_correct': 0,

          },

          'answer3': {
            'id': 0,
            'name':'',
            'test_question_id': 5,
            'is_correct': 0,

          },

          'answer4': {
            'id': 0,
            'name':'',
            'test_question_id': 5,
            'is_correct': 1,

          },
        },

      };
    },
	methods:{
	  saveQuiz(){
	    axios.post('/createquiz', this.quiz).then(
	      response => {
	        console.log("added", response.data.test_question);
	      }
	    ).catch(error => {
	        console.log("error");
	    })

  	},
    back(){
        Inertia.visit(route('tests'))
      }
	},
	async created(){
      await axios.get('/gettests')
        .then((response)=>{
          this.tests = response.data;
          console.log(response.data)

        })
        .catch((error)=>{
          console.log(error)
        })
    }
};
</script>

<template>
<MainActivity/>
<img @click="back" src="/icons/back.svg" class="back-icon m-10" width="20" alt="back">
<div class="grid justify-items-center">

  <form class="m-10" @submit.prevent="saveQuiz()">

    <div class="grid justify-items-center">

      <!--test names options-->
      <h3>Create a quiz for your test</h3>

    <div>
        <input class="rounded m-2" type="number" v-model="quiz.test_question.test_id" placeholder="test id"/>
    </div>

      <!--test question-->
      <div>
        <input class="rounded m-2" type="text" v-model="quiz.test_question.name" placeholder="question name"/>
      </div>

      <!--test question answers-->
      <div>
        <input class="rounded m-2" type="text" v-model="quiz.answer1.name" placeholder="option 1"/>
      </div>

      <div>
        <input class="rounded m-2" type="text" v-model="quiz.answer2.name" placeholder="option 2"/>
      </div>

      <div>
        <input class="rounded m-2" type="text" v-model="quiz.answer3.name" placeholder="option 3"/>
      </div>

      <div>
        <input class="rounded m-2" type="text" v-model="quiz.answer4.name" placeholder="option 4"/>
      </div>

      <div>
        <button type="submit" class="m-2 bg-rose-200 hover:bg-rose-300 text-white font-bold py-2 px-4 border border-rose-300 rounded">
        create
      </button>
      </div>

    </div>

  </form>
  </div>


</template>