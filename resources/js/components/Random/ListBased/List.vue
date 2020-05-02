<template>
    <div>
        <v-card class="mx-auto">
            <v-card-title>
                Bland liste
            </v-card-title>
            <v-card-subtitle>
                Adskil elementer med ny linje
            </v-card-subtitle>
            <v-container>
                <v-alert type='error' v-if="status.error.status">
                    {{ status.error.error }}
                </v-alert>
                <form class="md-layout" @submit.prevent="onSubmit">
                    <v-textarea
                        v-model="input.elements"
                        label="Elementer der skal blandes"
                        outlined
                        required
                    ></v-textarea>
                    <v-btn
                        color="error"
                        type="submit"
                        style="display:block;margin-left: auto;margin-right: auto;"
                        v-if="!status.loading"
                    >Shaken but not stirred</v-btn>
                </form>
                <div v-if="status.loading">
                    <img class="lava-lamp" src="/svg/lava_lamp.svg" alt="Lava lamp">
                </div>
            </v-container>
            <v-container v-if="status.ready">
                <v-card>
                    <v-card-title>
                        Blandet liste
                    </v-card-title>
                    <div style="padding-left: 10px;padding-right: 10px;">
                        <v-simple-table>
                            <template v-slot:default>
                                <tbody>
                                <tr v-for="element in data.elements" v-bind:key="element.id">
                                    <td>{{element.data}}</td>
                                </tr>
                                </tbody>
                            </template>
                        </v-simple-table>
                    </div>
                </v-card>
            </v-container>
        </v-card>
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
                error: {
                    status: false,
                    error: 'Error test',
                },
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
                    this.status.error.status = true;
                    this.status.error.error = `Noget gik galt, kontakt venligst udvikleren. Kode: ${2}`; 
                    this.status.loading = false;
                })
        }
    }
}
</script>