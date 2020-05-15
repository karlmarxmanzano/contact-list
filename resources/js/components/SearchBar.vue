<template>
    <div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search contact" v-model="query" @focus="focus = true">
      </form>

      <!-- <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
        </div> -->

      <div v-if="focus" class="search shadow-sm">
        <div v-if="results.length > 0 && query" @click="focus = false">
            <a :href="results.url" class="search-result">
                <!-- <div class="flex items-center"> -->
                    <div v-for="result in results.slice(0,10)" :key="result.id">
                          <p>{{ result.title }}</p>
                    </div>
                <!-- </div> -->
            </a>
        </div>
        <div v-else>No results found for '{{ query }}'</div>
      </div>
    </div>
</template>



<script>
  export default {
    data() {
      return {
        query: null,
        results: [],
        focus: false
      };
    },
    watch: {
      query(after, before) {
        this.searchMembers();
      }
    },
    methods: {
      searchMembers() {
        axios.get('search', { params: { query: this.query } })
        .then(response => this.results = response.data)
        .catch(error => console.log(error.response.data));
      }
    }
  }
</script>

<style lang="css" scoped>
  .search {
    position: absolute;
    padding: 16px;
    width: 300px;
    margin-top: 10px;
    margin-right: 20px;
    border-radius: 5px;
    z-index: 1;
    background-color: #FFF;
    border: 1px solid #EEE;
  }

  .search-result:hover {
    cursor: pointer;
  }
</style>