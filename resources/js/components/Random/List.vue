<template>
    <div>
        <div id="errors" v-if="status.error">
            <p>Undskyld, der var problemer med dine deltagere, de nægtede. Kom venligst tilbage senere når vi har disciplineret dem.</p>
        </div>
        <div v-if="!status.loading">
            <p>Indsæt elementer der skal blandes</p>
            <div class="form-group">
                <textarea  id="elements" v-model="input.elements" class="form-control w-100"></textarea>
            </div>
            <br>
            <div class="form-group">
                <button v-on:click="onSubmit" class="genric-btn danger radius" style="display:block;margin-left: auto;margin-right: auto;">Shaken but not stirred</button>
            </div>
            <div v-if="status.ready">
                <blockquote class="generic-blockquote">
                    <p style="font-weight: bold;">Blandet liste</p>
                    <div v-for="element in data.elements" v-bind:key="element.id">
                        <p>{{element.data}}</p>
                    </div>
                </blockquote>
            </div>
        </div>
        <div v-if="status.loading">
            <img class="lava-lamp" src="/svg/lava_lamp.svg" alt="Lava lamp">
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            input: {
                size: 4,
                elements: ""
            },
            data: {
                elements: {},
            },
            status: {
                loading: false,
                error: false,
                ready: false,
            }
        }
    },
    methods: {
        onSubmit() {
            this.status.loading = true;
            let data = this.input.elements.split('\n');
            console.log(data);
            axios
                .post('/api/random/list', {
                    'list': data
                })
                .then(response => {
                    console.log(response);
                    this.data.elements = response.data.result;
                    
                    this.status.loading = false;
                    this.status.ready = true;
                    this.status.error = false;
                })
                .catch(e => {
                    console.log(e);
                    this.status.error = true;
                    this.status.loading = false;
                })
        }
    }
}
</script>

<style>
.lava-lamp {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>