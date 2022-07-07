<script>
import { Link } from '@inertiajs/inertia-vue3';
import MainActivity from '@/Layouts/MainActivity';

  export default {
    components: {
      Link,
      MainActivity
    },

    props: ['test'],
    data(){
      return {
        activeQuestionKey: 0,
        questions: [],
        answers: [],
        index: 0,
        correctAnswers: 0,
        correctPercentage: 0,
      };
    },
    methods: {
    finishTest() {
    let app = this;
    axios.post(route('setTestResult', this.test.id), {answers: this.answers})
    .then(response => {

      // fill result card
      app.correctAnswers = response.data.correctAnswers;

      app.correctPercentage = response.data.correctPercentage;

      // show result window
      app.activeQuestionKey++;

    })
    .catch(err => {
      alert(err)
    })

    },
    reload() {
        this.activeQuestionKey = 0;
        this.answers = {};
    },
},

    mounted: function() {

    let answersHashmap = {};

    this.test.test_questions.filter(question => {

      question.test_question_answers.filter(answer => {

        answersHashmap[answer.id] = false;

      })
    });

    this.answers = answersHashmap;
    },
};

</script>

<template>
<MainActivity>
</MainActivity>

<div class="flex w-full h-screen justify-center items-center" id="app">
<div class="w-full max-w-xl">
  <div v-if="test.test_questions.length > activeQuestionKey">

    <h1 class="font-bold text-3xl text-center text-rose-400">
       {{test.name}}
    </h1>

    <div class="bg-white p-6 rounded-lg shadow-lg w-full mt-4">

    <div v-for="(question, index) in test.test_questions">
      <div class="card rounded-lg border-gray-300 border mb-2 mx-auto" v-if="activeQuestionKey === index">

        <div class="px-3 pt-3 pb-2.5">
          <span class="text-sm">
             Page  {{index+1}} of {{ test.test_questions.length }}
          </span>

          <h3 class="question-text mt-2 mb-4">{{ question.name }}</h3>
          <ul class="answers-list">
            <li v-for="answer in question.test_question_answers" class="mb-6">
              <label class="block mt-4 border border-gray-300 rounded-lg py-2 px-6 text-lg hover:bg-gray-100">
                <input v-model="answers[answer.id]" type="checkbox" class="focus:ring-opacity-0 w-6 h-6 rounded
                text-rose-300">
                 <span class="ml-2"> {{ answer.name }} </span>
              </label>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>

    <div class="mt-1 mb-3 flow-root">
    <button class="float-right px-5 py-2 bg-rose-400 text-white text-sm font-bold tracking-wide rounded hover:bg-rose-200"
    v-if="test.test_questions.length - 1 > activeQuestionKey" @click="activeQuestionKey++">
      Next
    </button>

    <button v-else class="float-right px-5 py-2 bg-rose-400 text-white text-sm font-bold tracking-wide rounded hover:bg-rose-200" @click.once="finishTest()">
       Finish
    </button>
  </div>

</div>

  <div class="card rounded-lg border-gray-300 border mb-4 mx-auto"
    v-if="activeQuestionKey == test.test_questions.length" >

    <div class="px-6 pt-6 pb-2.5">
      <p class="text-2xl text-center mt-12 font-semibold">
        Your result
      </p>

      <p class="mt-2 text-center">
        <span class="text-8xl font-extrabold">
          {{ correctAnswers }}/{{ test.test_questions.length }} | {{ correctPercentage }}%
        </span>
      </p>

    </div>

    <div class="flex justify-center  border-t border-gray-300 pt-5 pb-7 px-7">
      <button class="btn flex items-center btn-next">
        <Link class="hover:text-rose-400" :href="route('tests')">Finish</Link>
      </button>
      <button class="btn flex items-center ml-3" @click="reload">
        <span class="hover:text-rose-400">Try again</span>
      </button>
    </div>

  </div>
</div>
</div>
</template>

