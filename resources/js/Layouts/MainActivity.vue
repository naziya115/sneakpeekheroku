<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

  export default {
    components: {
      Head,
      Link,
    },
    methods: {
    }
}
</script>
<template>
   	<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow-md py-2 bg-white relative flex items-center w-full justify-between">
    <div class="px-6 w-full flex flex-wrap items-center justify-between">
      <div class="flex items-center">
        <button
          class="navbar-toggler border-0 py-3 lg:hidden leading-none text-xl bg-transparent text-gray-600 hover:text-gray-700 focus:text-gray-700 transition-shadow duration-150 ease-in-out mr-2"
          type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentY"
          aria-controls="navbarSupportedContentY" aria-expanded="false" aria-label="Toggle navigation">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-5" role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor"
              d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
            </path>
          </svg>
        </button>
      </div>
      <div class="navbar-collapse collapse grow items-center" id="navbarSupportedContentY">
        <ul class="navbar-nav mr-auto lg:flex lg:flex-row">

          <li class="nav-item">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark mt-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path>
            </svg>
          </li>

          <li class="nav-item">
            <a class="nav-link block pr-2 lg:px-2 py-2 text-black hover:text-slate-500 focus:text-slate-500 transition duration-150 ease-in-out"
              data-mdb-ripple="true" data-mdb-ripple-color="light" :href="route('main')">Sneak Peek</a>
          </li>
          <li v-if="$page.props.user" class="nav-item mb-2 lg:mb-0">
            <Link :href="route('profile.show')" class="nav-link block pr-2 lg:px-2 py-2 text-black hover:text-slate-500 cursor-pointer focus:text-slate-500 transition duration-150 ease-in-out"
              data-mdb-ripple="true" data-mdb-ripple-color="light">{{ $page.props.user.name }}</Link>
          </li>
          <li v-if="$page.props.user" class="nav-item mb-2 lg:mb-0">
            <Link class="nav-link block pr-2 lg:px-2 py-2 text-black hover:text-slate-500 focus:text-slate-500 transition duration-150 ease-in-out" :href="route('tests')">
              Tests
            </Link>
          </li>

          <li v-if="!$page.props.user" class="nav-item">
              <Link class="nav-link block pr-2 lg:px-2 py-2 text-black hover:text-slate-500 focus:text-slate-500 transition duration-150 ease-in-out" :href="route('register')">
            	Register
        	  </Link>
          </li>
          <li v-if="!$page.props.user" class="nav-item">
              <Link class="nav-link block pr-2 lg:px-2 py-2 text-black hover:text-slate-500 focus:text-slate-500 transition duration-150 ease-in-out" :href="route('login')">
            	Log in
        	  </Link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
</header>
</template>


