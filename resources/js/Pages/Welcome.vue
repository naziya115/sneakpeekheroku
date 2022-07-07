<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainActivity from '@/Layouts/MainActivity';

  export default {
    components: {
      Head,
      Link,
      MainActivity
    },
    props: {
      canLogin: Boolean,
      canRegister: Boolean,
      laravelVersion: String,
      phpVersion: String,
    },
}
</script>

<template>
<MainActivity/>

<!-- code of the main page -->
  <div class="py-20" style="background: #fff1f2"
    >
      <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold mb-2 text-black">
          Sneak Peek
        </h2>
        <h3 class="text-2xl mb-8 text-gray-500">
          The Best Platform to become #1 Student at School
        </h3>

        <Link v-if="$page.props.user" :href="route('tests')">
        <button class="font-bold rounded py-2 px-5 shadow-lg uppercase tracking-wider hover:text-white bg-rose-300">
          Start
        </button>
      </Link>

      <Link v-else :href="route('login')">
        <button class="font-bold rounded py-2 px-5 shadow-lg uppercase tracking-wider hover:text-white bg-rose-300">
          Start
        </button>
      </Link>

      <div class="text-black bottom-0 float-right mt-8">Naziya Zhanabayeva</div>

      </div>
    </div>

    <section class="container mx-auto px-6 p-10">
      <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
        Features
      </h2>
      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <h4 class="text-3xl text-gray-800 font-bold mb-3">Computer Science</h4>
          <p class="text-gray-600 w-80 mb-8">Studying computer science will help you to develop problem-solving,
            critical thinking and complex analytical skills. Skills such as these
            are especially useful for specialists working with complex algorithms and
            big data</p>
        </div>
        <div class="w-full md:w-1/2">
          <img class="rounded" src="icons/main_page1.jpg" alt="Computer Science" />
        </div>
      </div>

      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <img class="rounded" src="icons/main_page2.jpg" alt="English" />
        </div>
        <div class="w-full md:w-1/2 pl-10">
          <h4 class="text-3xl text-gray-800 font-bold mb-3">English Language</h4>
          <p class="text-gray-600 mb-8 w-80">English is spoken as a first language<br> by around 400 million people worldwide. <br>
            It gives you an open door to the world and helps you communicate with global citizens.</p>
        </div>
      </div>

      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <h4 class="text-3xl text-gray-800 font-bold mb-3">Mathematics</h4>
          <p class="text-gray-600 mb-8 w-80">Mathematics provides an effective way of building mental discipline and encourages
            logical reasoning and mental rigor. Mathematical knowledge plays a crucial role in
            understanding the contents of other school subjects such as science, social studies, and even music and art.</p>
        </div>
        <div class="w-full md:w-1/2">
          <img class="rounded" src="icons/main_page3.jpg" alt="Math" />
        </div>
      </div>
    </section>

</template>
