<template>
    <div>
        <header-component/>
        <div class="container">
            <router-view></router-view>
        </div>
        <footer-component/>
    </div>
</template>

<script>
// Components
import Header from '../components/Layout/Header'
import Footer from '../components/Layout/Footer'

export default {
    components: {
        'header-component': Header,
        'footer-component': Footer
    }
}
</script>