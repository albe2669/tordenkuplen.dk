<template>
    <header class="main_menu home_menu" style="padding: 0px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="main_menu_iner">
                        <div class="search_icon">
                        </div>
                        <div class="logo">
                            <a href="/"><img src="images/logo.png" style="height:70px;" alt="#"></a>
                        </div>
                        <span class="menu-trigger visible-xs">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <div class="off-canven-menu">
                            <span class="close-icon">
                                <i class="ti-close"></i>
                            </span>
                            <div class="canven-menu-warp">
                                <div class="canven-menu-iner">
                                    <ul>
                                        <li v-for="link in nav" :key=link.id>
                                            <router-link :to="{ name: link.destination }">{{ link.text }}</router-link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            nav: [
                {
                    "id": 1,
                    "destination": "home",
                    "text": "Hjem",
                },
                {
                    "id": 2,
                    "destination": "hello",
                    "text": "About"
                },
            ]
        }
    }
}
</script>