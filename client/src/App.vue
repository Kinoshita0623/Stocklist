<template>
    <v-app>


        <!-- ナビだよぉ -->
        <v-navigation-drawer v-model="drawer" app>
            <Navigation />
        </v-navigation-drawer>

        <!-- ヘッダーだよぉ -->
        <v-touch v-on:swiperight="onSwipeRight">
            <v-app-bar app>
                <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title @click="top">Stocklist</v-toolbar-title>
                <v-spacer></v-spacer>
                <Header />
            </v-app-bar>
        </v-touch>

        <!-- mainです -->
        <v-main>
            <router-view/>
        </v-main>


    </v-app>
</template>

<script>
import Navigation from '@/components/Navigation.vue'
import Header from '@/components/Header.vue'

export default {
    name: 'App',
    components: {
        Navigation,
        Header,
    },
    data () {
        return {
            drawer: null,
        }
    },
    methods:{
        onSwipeRight(){
            this.drawer = !this.drawer
        },
        top:()=>{
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    },
};
</script>
