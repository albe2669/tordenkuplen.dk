<template>
    <div>
        <v-card class="mx-auto">
            <v-card-title>Dan grupper</v-card-title>
            <v-container>
                <v-alert type='error' v-if="status.error.status">
                    {{ status.error.error }}
                </v-alert>
                <form @submit.prevent="onSubmit" class="md-layout">
                    <v-text-field
                        v-model="input.size"
                        type='number'
                        label="Elementer pr gruppe"
                        required
                        integer
                    ></v-text-field> <!-- TODO: THIS-->
                    <v-switch
                        v-model="input.strict"
                        label="Spred ligeligt"
                    ></v-switch>
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
                    >Split like Moses</v-btn>
                </form>
                <div v-if="status.loading">
                    <img class="lava-lamp" src="/svg/lava_lamp.svg" alt="Lava lamp">
                </div>
            </v-container>
            <v-container v-if="status.ready">
                <div v-for="group in data.groups" v-bind:key="group.id">
                    <v-card style="margin-bottom:10px">
                        <v-card-title>
                            Gruppe {{group.id + 1}}
                        </v-card-title>
                        <div style="padding-left: 10px;padding-right: 10px;">
                            <v-simple-table>
                                <template v-slot:default>
                                    <tbody>
                                        <tr v-for="element in group.data" v-bind:key="element.id">
                                            <td>{{element.data}}</td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </div>
                    </v-card>
                </div>
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
                elements: "",
                strict: false,
            },
            data: {
                groups: [],
            },
            status: {
                loading: false,
                error: {
                    status: false,
                    error: '',
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
                    this.status.error.status = true;
                    this.status.error.error = `Noget gik galt, kontakt venligst udvikleren. Kode: ${2}`; 
                    this.status.loading = false;
                })
        }
    }
}
</script>
