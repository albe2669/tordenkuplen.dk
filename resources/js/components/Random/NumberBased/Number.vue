<template>
    <div>
        <v-card class="mx-auto">
            <v-card-title>Tilfældige tal</v-card-title>
            <v-container>
                <v-alert type='error' v-if="status.error.status">
                    {{ status.error.error }}
                </v-alert>
                <form @submit.prevent="onSubmit" class="md-layout">
                    <v-text-field
                        v-model="input.min"
                        type='number'
                        label="Minimum"
                        required
                        integer
                    ></v-text-field>
                    <v-text-field
                        v-model="input.max"
                        type='number'
                        label="Maksimum"
                        required
                        integer
                    ></v-text-field>
                     <v-text-field
                        v-model="input.amount"
                        type='number'
                        label="Mængde"
                        required
                        integer
                    ></v-text-field>
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
                <v-card>
                    <v-card-title>
                        Tilfældige tal
                    </v-card-title>
                    <div style="padding-left: 10px;padding-right: 10px;">
                        <v-simple-table>
                            <template v-slot:default>
                                <tbody>
                                <tr v-for="element in data.numbers" v-bind:key="element.id">
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
                min: 0,
                max: 100,
                amount: 1
            },
            data: {
                numbers: []
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

            axios
                .post('/api/random/number', {
                    'min': this.input.min,
                    'max': this.input.max,
                    'amount': this.input.amount,
                })
                .then(response => {
                    console.log(response);

                    this.data.numbers = response.data.result
                    this.status.loading = false;
                    this.status.ready = true;
                    this.status.error.status = false;
                })
                .catch(e => {
                    console.log(e.response);

                    this.status.error.status = true;
                    this.status.error.error = `Noget gik galt, kontakt venligst udvikleren. Kode ${e.response.status}`; 
                    this.status.loading = false;
                })
        }
    }
}
</script>
