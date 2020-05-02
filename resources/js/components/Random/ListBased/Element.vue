<template>
    <div>
        <v-card class="mx-auto">
            <v-card-title>
                Tilfældigt element
            </v-card-title>
            <v-container>
                <v-alert type='error' v-if="status.error.status">
                    {{ status.error.error }}
                </v-alert>
                <form class="md-layout" @submit.prevent="onSubmit">
                    <v-textarea
                        v-model="input.elements"
                        label="Elementer der skal blandes"
                        outlined
                    ></v-textarea>
                    <v-btn
                        color="error"
                        type="submit"
                        style="display:block;margin-left: auto;margin-right: auto;"
                        v-if="!status.loading"
                        required
                    >One element leaves</v-btn>
                </form>
                <div v-if="status.loading">
                    <img class="lava-lamp" src="/svg/lava_lamp.svg" alt="Lava lamp">
                </div>
            </v-container>
            <v-container v-if="status.ready">
                <v-card>
                    <v-card-title>
                        Element {{data.element.id + 1}}
                    </v-card-title>
                    <div style="padding-left: 10px;padding-right: 10px;">
                        <v-simple-table>
                            <template v-slot:default>
                                <tbody>
                                <tr>
                                    <td>{{ data.element.data }}</td>
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
                element: {},
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
                .post('/api/random/element', {
                    'list': data
                })
                .then(response => {
                    console.log(response);
                    this.data.element = response.data.result;

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