<template>
    <div>
        <div id="errors" v-if="status.error">
            <p>Undskyld, der var problemer med dine deltagere, de nægtede. Kom venligst tilbage senere når vi har disciplineret dem.</p>
        </div>
        <div v-if="!status.loading">
            <p>Hvor mange personer skal der være pr gruppe?</p>
            <div class="form-group">
                <input type="number" v-model="input.size" class="form-control">
            </div>
            <div class="switch-wrap d-flex justify-content-between">
                <p>Spred ligeligt</p>
                <div class="primary-checkbox">
                    <input id="default-checkbox" type="checkbox" v-model="input.strict" class="form-control">
                    <label for="default-checkbox"></label>
                </div>
            </div>
            <p>Indsæt personer der skal fordeles. Adskil med ny linje</p>
            <div class="form-group">
                <textarea  id="elements" v-model="input.elements" class="form-control w-100"></textarea>
            </div>
            <br>
            <div class="form-group">
                <button v-on:click="onSubmit" class="genric-btn danger radius" style="display:block;margin-left: auto;margin-right: auto;">Split like Moses</button>
            </div>
            <div v-if="status.ready">
                <div v-for="group in data.groups" v-bind:key="group.id">
                    <blockquote class="generic-blockquote">
                        <p style="font-weight: bold;">Gruppe {{group.id + 1}}</p>
                        <div v-for="element in group.data" v-bind:key="element.id">
                            <p>{{ element.data }}</p>
                        </div>
                    </blockquote>
                </div>
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
                elements: "",
                strict: false,
            },
            data: {
                groups: [],
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
                .post('/api/random/group', {
                    'size': this.input.size,
                    'list': data,
                    'strict': this.input.strict,
                })
                .then(response => {
                    console.log(response);
                    this.data.groups = response.data.result;

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
