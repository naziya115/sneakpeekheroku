<script>
  import JetNavLink from '@/Jetstream/NavLink';
  import { Link } from '@inertiajs/inertia-vue3';
  import MainActivity from '@/Layouts/MainActivity';

  export default {
    components: {
      Link,
      JetNavLink,
      MainActivity
    },

    data(){
      return {
        tests: [],
          'test': {
            'id': 0,
            'name':'',
            'grade': 10,
            'subject':'',
            'created_at': '2022-06-02 00:00:01',
            'updated_at': '2022-06-02 00:00:01'
          },

      };
    },
     methods: {
    },

    async created(){
      await axios.get('/gettests')
        .then((response)=>{
          this.tests = response.data;
          //console.log(response.data)

        })
        .catch((error)=>{
          console.log(error)
        })
    }
  };
</script>


<template>
<MainActivity>
</MainActivity>

<div class="container">

<div class="mt-5" align="right">
   <Link class="mr-5 hover:text-slate-500" :href="route('newtest')">Add new test</Link>
   <Link class="hover:text-slate-500" :href="route('newquiz')">Add new quiz</Link>
</div>


  <h2>Tests</h2>
  <ul class="responsive-table">
    <li class="table-header text-white bg-rose-300">
      <div class="col col-1">id</div>
      <div class="col col-2">question name</div>
      <div class="col col-3">grade</div>
      <div class="col col-3">subject</div>
    </li>
    <li class="table-row indent-8" v-for="test in tests" :key="test.id">
      <div class="col col-1" data-label="id">{{test.id}}.</div>
      <Link :href="route('test', test.id)"> <div class="col col-2 hover:underline decoration-wavy" data-label="question name">
      {{test.name}}</div> </Link>
      <div class="col col-3" data-label="grade">{{test.grade}}</div>
      <div class="col col-3" data-label="subject">{{test.subject}}</div>
    </li>
  </ul>
</div>

</template>

<style lang="scss">
  body {
  font-family: "lato", sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }

  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row {
    }
    li {
      display: block;
    }
    .col {
      flex-basis: 100%;
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6c7a89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}
</style>