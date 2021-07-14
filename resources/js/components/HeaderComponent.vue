<template>
    <div class="container-filid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">変数名ジェネレーター</span>
                <div>
                    <button class="btn btn-success">Login</button>
                    <router-link v-bind:to="{name:'task.list'}">
                        <button class="btn btn-success">Login</button>
                    </router-link>
                    <router-link v-bind:to="{name:'task.create'}">
                        <button class="btn btn-danger">Logout</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>