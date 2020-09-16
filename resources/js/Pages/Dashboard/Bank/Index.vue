<template>
<div>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Kelola Bank
                </h1>
                <h2 class="subtitle">
                    Kelola Rekening bank anda
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <index-list></index-list>
            </div>
        </div>
    </section>
</div>
</template>

<script>
import IndexList from "./IndexList";
export default {
    components: {
        IndexList
    },
    name: "Index",
    props: [
        'bankMasters',
        'userBanks'
    ],
    data() {
      return {
          users: '',
          banks: '',
      }
    },
    mounted(){
        this.users = this.userBanks
        this.banks = this.bankMasters
    },
    methods: {
    }
}
</script>

<style scoped>

</style>
